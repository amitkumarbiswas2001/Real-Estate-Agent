@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.booking.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.bookings.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.booking.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $booking->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.booking.fields.customer') }}
                                    </th>
                                    <td>
                                        {{ $booking->customer->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.booking.fields.property') }}
                                    </th>
                                    <td>
                                        {{ $booking->property->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.booking.fields.amount') }}
                                    </th>
                                    <td>
                                        {{ $booking->amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.booking.fields.type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Booking::TYPE_SELECT[$booking->type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.booking.fields.paid_amount') }}
                                    </th>
                                    <td>
                                        {{ $booking->paid_amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.booking.fields.payable_amount') }}
                                    </th>
                                    <td>
                                        {{ $booking->payable_amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.booking.fields.booking_form') }}
                                    </th>
                                    <td>
                                        {{ $booking->booking_form }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.booking.fields.booking_until') }}
                                    </th>
                                    <td>
                                        {{ $booking->booking_until }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.booking.fields.booking_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Booking::BOOKING_STATUS_RADIO[$booking->booking_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.booking.fields.document_number') }}
                                    </th>
                                    <td>
                                        {{ $booking->document_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.booking.fields.document') }}
                                    </th>
                                    <td>
                                        @if($booking->document)
                                            <a href="{{ $booking->document->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.booking.fields.document_verified') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $booking->document_verified ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.bookings.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection