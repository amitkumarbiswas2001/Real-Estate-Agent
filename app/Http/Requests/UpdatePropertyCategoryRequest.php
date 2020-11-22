<?php

namespace App\Http\Requests;

use App\Models\PropertyCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePropertyCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('property_category_edit');
    }

    public function rules()
    {
        return [
            'category' => [
                'string',
                'required',
                'unique:property_categories,category,' . request()->route('property_category')->id,
            ],
            'slug'     => [
                'string',
                'required',
                'unique:property_categories,slug,' . request()->route('property_category')->id,
            ],
        ];
    }
}
