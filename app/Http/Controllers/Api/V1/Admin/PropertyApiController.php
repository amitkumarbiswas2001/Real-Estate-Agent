<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Http\Resources\Admin\PropertyResource;
use App\Models\Property;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PropertyApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('property_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PropertyResource(Property::with(['category', 'location'])->get());
    }

    public function store(StorePropertyRequest $request)
    {
        $property = Property::create($request->all());

        if ($request->input('photo', false)) {
            $property->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($request->input('gallery', false)) {
            $property->addMedia(storage_path('tmp/uploads/' . $request->input('gallery')))->toMediaCollection('gallery');
        }

        return (new PropertyResource($property))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Property $property)
    {
        abort_if(Gate::denies('property_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PropertyResource($property->load(['category', 'location']));
    }

    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $property->update($request->all());

        if ($request->input('photo', false)) {
            if (!$property->photo || $request->input('photo') !== $property->photo->file_name) {
                if ($property->photo) {
                    $property->photo->delete();
                }

                $property->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($property->photo) {
            $property->photo->delete();
        }

        if ($request->input('gallery', false)) {
            if (!$property->gallery || $request->input('gallery') !== $property->gallery->file_name) {
                if ($property->gallery) {
                    $property->gallery->delete();
                }

                $property->addMedia(storage_path('tmp/uploads/' . $request->input('gallery')))->toMediaCollection('gallery');
            }
        } elseif ($property->gallery) {
            $property->gallery->delete();
        }

        return (new PropertyResource($property))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Property $property)
    {
        abort_if(Gate::denies('property_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $property->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
