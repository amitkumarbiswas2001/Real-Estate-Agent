<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPropertyRequest;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PropertyController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('property_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $properties = Property::all();

        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        abort_if(Gate::denies('property_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = PropertyCategory::all()->pluck('category', 'id')->prepend(trans('global.pleaseSelect'), '');

        $locations = Location::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.properties.create', compact('categories', 'locations'));
    }

    public function store(StorePropertyRequest $request)
    {
        $property = Property::create($request->all());

        if ($request->input('photo', false)) {
            $property->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        foreach ($request->input('gallery', []) as $file) {
            $property->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $property->id]);
        }

        return redirect()->route('admin.properties.index');
    }

    public function edit(Property $property)
    {
        abort_if(Gate::denies('property_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = PropertyCategory::all()->pluck('category', 'id')->prepend(trans('global.pleaseSelect'), '');

        $locations = Location::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $property->load('category', 'location');

        return view('admin.properties.edit', compact('categories', 'locations', 'property'));
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

        if (count($property->gallery) > 0) {
            foreach ($property->gallery as $media) {
                if (!in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }

        $media = $property->gallery->pluck('file_name')->toArray();

        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $property->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }

        return redirect()->route('admin.properties.index');
    }

    public function show(Property $property)
    {
        abort_if(Gate::denies('property_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $property->load('category', 'location');

        return view('admin.properties.show', compact('property'));
    }

    public function destroy(Property $property)
    {
        abort_if(Gate::denies('property_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $property->delete();

        return back();
    }

    public function massDestroy(MassDestroyPropertyRequest $request)
    {
        Property::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('property_create') && Gate::denies('property_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Property();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
