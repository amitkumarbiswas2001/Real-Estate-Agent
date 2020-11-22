<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPropertyCategoryRequest;
use App\Http\Requests\StorePropertyCategoryRequest;
use App\Http\Requests\UpdatePropertyCategoryRequest;
use App\Models\PropertyCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PropertyCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('property_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $propertyCategories = PropertyCategory::all();

        return view('admin.propertyCategories.index', compact('propertyCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('property_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.propertyCategories.create');
    }

    public function store(StorePropertyCategoryRequest $request)
    {
        $propertyCategory = PropertyCategory::create($request->all());

        if ($request->input('photo', false)) {
            $propertyCategory->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $propertyCategory->id]);
        }

        return redirect()->route('admin.property-categories.index');
    }

    public function edit(PropertyCategory $propertyCategory)
    {
        abort_if(Gate::denies('property_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.propertyCategories.edit', compact('propertyCategory'));
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

        return redirect()->route('admin.property-categories.index');
    }

    public function show(PropertyCategory $propertyCategory)
    {
        abort_if(Gate::denies('property_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.propertyCategories.show', compact('propertyCategory'));
    }

    public function destroy(PropertyCategory $propertyCategory)
    {
        abort_if(Gate::denies('property_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $propertyCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyPropertyCategoryRequest $request)
    {
        PropertyCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('property_category_create') && Gate::denies('property_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PropertyCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
