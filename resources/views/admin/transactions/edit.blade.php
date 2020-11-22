@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transaction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transactions.update", [$transaction->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="payment_status">{{ trans('cruds.transaction.fields.payment_status') }}</label>
                <input class="form-control {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" type="text" name="payment_status" id="payment_status" value="{{ old('payment_status', $transaction->payment_status) }}">
                @if($errors->has('payment_status'))
                    <span class="text-danger">{{ $errors->first('payment_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.payment_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_reference_number">{{ trans('cruds.transaction.fields.payment_reference_number') }}</label>
                <input class="form-control {{ $errors->has('payment_reference_number') ? 'is-invalid' : '' }}" type="text" name="payment_reference_number" id="payment_reference_number" value="{{ old('payment_reference_number', $transaction->payment_reference_number) }}">
                @if($errors->has('payment_reference_number'))
                    <span class="text-danger">{{ $errors->first('payment_reference_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.payment_reference_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="refund_reference_number">{{ trans('cruds.transaction.fields.refund_reference_number') }}</label>
                <input class="form-control {{ $errors->has('refund_reference_number') ? 'is-invalid' : '' }}" type="text" name="refund_reference_number" id="refund_reference_number" value="{{ old('refund_reference_number', $transaction->refund_reference_number) }}">
                @if($errors->has('refund_reference_number'))
                    <span class="text-danger">{{ $errors->first('refund_reference_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.refund_reference_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.transaction.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $transaction->notes) }}</textarea>
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