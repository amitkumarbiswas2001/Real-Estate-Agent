<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePropertyCategoryRequest;
use App\Http\Requests\UpdatePropertyCategoryRequest;
use App\Http\Resources\Admin\PropertyCategoryResource;
use App\Models\PropertyCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PropertyCategoryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('property_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PropertyCategoryResource(PropertyCategory::all());
    }

    public function store(StorePropertyCategoryRequest $request)
    {
        $propertyCategory = PropertyCategory::create($request->all());

        if ($request->input('photo', false)) {
            $propertyCategory->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new PropertyCategoryResource($propertyCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PropertyCategory $propertyCategory)
    {
        abort_if(Gate::denies('property_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PropertyCategoryResource($propertyCategory);
    }

    public function update(UpdatePropertyCategoryRequest $request, PropertyCategory $propertyCategory)
    {
        $propertyCategory->update($request->all());

        if ($request->input('photo', false)) {
            if (!$propertyCategory->photo || $request->input('photo') !== $propertyCategory->photo->file_name) {
                if ($propertyCategory->photo) {
                    $propertyCategory->photo->delete();
                }

                $propertyCategory->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($propertyCategory->photo) {
            $propertyCategory->photo->delete();
        }

        return (new PropertyCategoryResource($propertyCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PropertyCategory $propertyCategory)
    {
        abort_if(Gate::denies('property_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $propertyCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
