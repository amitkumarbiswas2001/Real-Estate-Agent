@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.transaction.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.transactions.update", [$transaction->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="payment_status">{{ trans('cruds.transaction.fields.payment_status') }}</label>
                            <input class="form-control" type="text" name="payment_status" id="payment_status" value="{{ old('payment_status', $transaction->payment_status) }}">
                            @if($errors->has('payment_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.payment_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment_reference_number">{{ trans('cruds.transaction.fields.payment_reference_number') }}</label>
                            <input class="form-control" type="text" name="payment_reference_number" id="payment_reference_number" value="{{ old('payment_reference_number', $transaction->payment_reference_number) }}">
                            @if($errors->has('payment_reference_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_reference_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.payment_reference_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="refund_reference_number">{{ trans('cruds.transaction.fields.refund_reference_number') }}</label>
                            <input class="form-control" type="text" name="refund_reference_number" id="refund_reference_number" value="{{ old('refund_reference_number', $transaction->refund_reference_number) }}">
                            @if($errors->has('refund_reference_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('refund_reference_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.refund_reference_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="notes">{{ trans('cruds.transaction.fields.notes') }}</label>
                            <textarea class="form-control" name="notes" id="notes">{{ old('notes', $transaction->notes) }}</textarea>
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