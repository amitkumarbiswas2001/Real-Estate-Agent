<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaction_edit');
    }

    public function rules()
    {
        return [
            'payment_status'           => [
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
