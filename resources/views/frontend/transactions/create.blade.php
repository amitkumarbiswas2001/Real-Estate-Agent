@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.transaction.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.transactions.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="booking_id">{{ trans('cruds.transaction.fields.booking') }}</label>
                            <select class="form-control select2" name="booking_id" id="booking_id">
                                @foreach($bookings as $id => $booking)
                                    <option value="{{ $id }}" {{ old('booking_id') == $id ? 'selected' : '' }}>{{ $booking }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('booking'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('booking') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.booking_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="amount">{{ trans('cruds.transaction.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', '1') }}" step="0.01">
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment_method">{{ trans('cruds.transaction.fields.payment_method') }}</label>
                            <input class="form-control" type="text" name="payment_method" id="payment_method" value="{{ old('payment_method', '') }}">
                            @if($errors->has('payment_method'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_method') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.payment_method_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment_status">{{ trans('cruds.transaction.fields.payment_status') }}</label>
                            <input class="form-control" type="text" name="payment_status" id="payment_status" value="{{ old('payment_status', '') }}">
                            @if($errors->has('payment_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.payment_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment_type">{{ trans('cruds.transaction.fields.payment_type') }}</label>
                            <input class="form-control" type="text" name="payment_type" id="payment_type" value="{{ old('payment_type', '') }}">
                            @if($errors->has('payment_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.payment_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment_reference_number">{{ trans('cruds.transaction.fields.payment_reference_number') }}</label>
                            <input class="form-control" type="text" name="payment_reference_number" id="payment_reference_number" value="{{ old('payment_reference_number', 'N/A') }}">
                            @if($errors->has('payment_reference_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_reference_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.payment_reference_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="refund_reference_number">{{ trans('cruds.transaction.fields.refund_reference_number') }}</label>
                            <input class="form-control" type="text" name="refund_reference_number" id="refund_reference_number" value="{{ old('refund_reference_number', 'N/A') }}">
                            @if($errors->has('refund_reference_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('refund_reference_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.refund_reference_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="notes">{{ trans('cruds.transaction.fields.notes') }}</label>
                            <textarea class="form-control" name="notes" id="notes">{{ old('notes') }}</textarea>
                            @if($errors->has('notes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notes') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection