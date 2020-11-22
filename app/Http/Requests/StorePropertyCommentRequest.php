<?php

namespace App\Http\Requests;

use App\Models\PropertyComment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePropertyCommentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('property_comment_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'rate'    => [
                'required',
            ],
        ];
    }
}
