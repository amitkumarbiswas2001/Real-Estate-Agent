<?php

namespace App\Http\Requests;

use App\Models\Location;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLocationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('location_edit');
    }

    public function rules()
    {
        return [
            'name'        => [
                'string',
                'required',
                'unique:locations,name,' . request()->route('location')->id,
            ],
            'slug'        => [
                'string',
                'required',
                'unique:locations,slug,' . request()->route('location')->id,
            ],
            'currency_id' => [
                'required',
                'integer',
            ],
            'country_id'  => [
                'required',
                'integer',
            ],
        ];
    }
}
