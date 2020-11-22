@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.transaction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transactions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="booking_id">{{ trans('cruds.transaction.fields.booking') }}</label>
                <select class="form-control select2 {{ $errors->has('booking') ? 'is-invalid' : '' }}" name="booking_id" id="booking_id">
                    @foreach($bookings as $id => $booking)
                        <option value="{{ $id }}" {{ old('booking_id') == $id ? 'selected' : '' }}>{{ $booking }}</option>
                    @endforeach
                </select>
                @if($errors->has('booking'))
                    <span class="text-danger">{{ $errors->first('booking') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.booking_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount">{{ trans('cruds.transaction.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '1') }}" step="0.01">
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_method">{{ trans('cruds.transaction.fields.payment_method') }}</label>
                <input class="form-control {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" type="text" name="payment_method" id="payment_method" value="{{ old('payment_method', '') }}">
                @if($errors->has('payment_method'))
                    <span class="text-danger">{{ $errors->first('payment_method') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.payment_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_status">{{ trans('cruds.transaction.fields.payment_status') }}</label>
                <input class="form-control {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" type="text" name="payment_status" id="payment_status" value="{{ old('payment_status', '') }}">
                @if($errors->has('payment_status'))
                    <span class="text-danger">{{ $errors->first('payment_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.payment_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_type">{{ trans('cruds.transaction.fields.payment_type') }}</label>
                <input class="form-control {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" type="text" name="payment_type" id="payment_type" value="{{ old('payment_type', '') }}">
                @if($errors->has('payment_type'))
                    <span class="text-danger">{{ $errors->first('payment_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.payment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_reference_number">{{ trans('cruds.transaction.fields.payment_reference_number') }}</label>
                <input class="form-control {{ $errors->has('payment_reference_number') ? 'is-invalid' : '' }}" type="text" name="payment_reference_number" id="payment_reference_number" value="{{ old('payment_reference_number', 'N/A') }}">
                @if($errors->has('payment_reference_number'))
                    <span class="text-danger">{{ $errors->first('payment_reference_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.payment_reference_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="refund_reference_number">{{ trans('cruds.transaction.fields.refund_reference_number') }}</label>
                <input class="form-control {{ $errors->has('refund_reference_number') ? 'is-invalid' : '' }}" type="text" name="refund_reference_number" id="refund_reference_number" value="{{ old('refund_reference_number', 'N/A') }}">
                @if($errors->has('refund_reference_number'))
                    <span class="text-danger">{{ $errors->first('refund_reference_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.refund_reference_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.transaction.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes') }}</textarea>
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection