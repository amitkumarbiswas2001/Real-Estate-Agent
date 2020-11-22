<?php

namespace App\Http\Requests;

use App\Models\PropertyCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePropertyCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('property_category_create');
    }

    public function rules()
    {
        return [
            'category' => [
                'string',
                'required',
                'unique:property_categories',
            ],
            'slug'     => [
                'string',
                'required',
                'unique:property_categories',
            ],
        ];
    }
}
