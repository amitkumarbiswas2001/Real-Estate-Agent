<?php

namespace App\Http\Requests;

use App\Models\Booking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBookingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('booking_edit');
    }

    public function rules()
    {
        return [
            'property_id'     => [
                'required',
                'integer',
            ],
            'amount'          => [
                'required',
            ],
            'type'            => [
                'required',
            ],
            'paid_amount'     => [
                'required',
            ],
            'payable_amount'  => [
                'required',
            ],
            'booking_form'    => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'booking_until'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'document_number' => [
                'string',
                'nullable',
            ],
        ];
    }
}
