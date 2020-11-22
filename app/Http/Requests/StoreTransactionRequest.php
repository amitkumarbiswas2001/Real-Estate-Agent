<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaction_create');
    }

    public function rules()
    {
        return [
            'payment_status'           => [
                'string',
                'nullable',
            ],
            'payment_method'           => [
                'string',
                'nullable',
            ],
            'payment_type'             => [
                'string',
                'nullable',
            ],
            'payment_reference_number' => [
                'string',
                'nullable',
            ],
            'refund_reference_number'  => [
                'string',
                'nullable',
            ],
        ];
    }
}
