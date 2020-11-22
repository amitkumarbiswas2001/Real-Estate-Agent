@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.booking.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.bookings.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="customer_id">{{ trans('cruds.booking.fields.customer') }}</label>
                            <select class="form-control select2" name="customer_id" id="customer_id">
                                @foreach($customers as $id => $customer)
                                    <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $customer }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('customer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('customer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.booking.fields.customer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="property_id">{{ trans('cruds.booking.fields.property') }}</label>
                            <select class="form-control select2" name="property_id" id="property_id" required>
                                @foreach($properties as $id => $property)
                                    <option value="{{ $id }}" {{ old('property_id') == $id ? 'selected' : '' }}>{{ $property }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('property'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('property') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.booking.fields.property_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="amount">{{ trans('cruds.booking.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', '0') }}" step="0.01" required>
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.booking.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.booking.fields.type') }}</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Booking::TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.booking.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="paid_amount">{{ trans('cruds.booking.fields.paid_amount') }}</label>
                            <input class="form-control" type="number" name="paid_amount" id="paid_amount" value="{{ old('paid_amount', '0') }}" step="0.01" required>
                            @if($errors->has('paid_amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paid_amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.booking.fields.paid_amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="payable_amount">{{ trans('cruds.booking.fields.payable_amount') }}</label>
                            <input class="form-control" type="number" name="payable_amount" id="payable_amount" value="{{ old('payable_amount', '0') }}" step="0.01" required>
                            @if($errors->has('payable_amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payable_amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.booking.fields.payable_amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="booking_form">{{ trans('cruds.booking.fields.booking_form') }}</label>
                            <input class="form-control date" type="text" name="booking_form" id="booking_form" value="{{ old('booking_form') }}">
                            @if($errors->has('booking_form'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('booking_form') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.booking.fields.booking_form_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="booking_until">{{ trans('cruds.booking.fields.booking_until') }}</label>
                            <input class="form-control date" type="text" name="booking_until" id="booking_until" value="{{ old('booking_until') }}">
                            @if($errors->has('booking_until'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('booking_until') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.booking.fields.booking_until_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.booking.fields.booking_status') }}</label>
                            @foreach(App\Models\Booking::BOOKING_STATUS_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="booking_status_{{ $key }}" name="booking_status" value="{{ $key }}" {{ old('booking_status', 'pending') === (string) $key ? 'checked' : '' }}>
                                    <label for="booking_status_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('booking_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('booking_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.booking.fields.booking_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="document_number">{{ trans('cruds.booking.fields.document_number') }}</label>
                            <input class="form-control" type="text" name="document_number" id="document_number" value="{{ old('document_number', '') }}">
                            @if($errors->has('document_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('document_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.booking.fields.document_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="document">{{ trans('cruds.booking.fields.document') }}</label>
                            <div class="needsclick dropzone" id="document-dropzone">
                            </div>
                            @if($errors->has('document'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('document') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.booking.fields.document_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="document_verified" value="0">
                                <input type="checkbox" name="document_verified" id="document_verified" value="1" {{ old('document_verified', 0) == 1 ? 'checked' : '' }}>
                                <label for="document_verified">{{ trans('cruds.booking.fields.document_verified') }}</label>
                            </div>
                            @if($errors->has('document_verified'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('document_verified') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.booking.fields.document_verified_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.documentDropzone = {
    url: '{{ route('admin.bookings.storeMedia') }}',
    maxFilesize: 10, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').find('input[name="document"]').remove()
      $('form').append('<input type="hidden" name="document" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="document"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($booking) && $booking->document)
      var file = {!! json_encode($booking->document) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="document" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection