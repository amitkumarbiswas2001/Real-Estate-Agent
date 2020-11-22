<?php

namespace App\Http\Requests;

use App\Models\Property;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePropertyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('property_edit');
    }

    public function rules()
    {
        return [
            'name'        => [
                'string',
                'required',
            ],
            'slug'        => [
                'string',
                'required',
                'unique:properties,slug,' . request()->route('property')->id,
            ],
            'price'       => [
                'required',
            ],
            'tax'         => [
                'required',
            ],
            'beds'        => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'baths'       => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'sqft'        => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'location_id' => [
                'required',
                'integer',
            ],
            'address'     => [
                'required',
            ],
            'city'        => [
                'string',
                'required',
            ],
            'state'       => [
                'string',
                'required',
            ],
            'lankmark'    => [
                'string',
                'nullable',
            ],
            'pincode'     => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
