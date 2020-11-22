@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.property.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.properties.update", [$property->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="photo">{{ trans('cruds.property.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.photo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.property.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $property->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="slug">{{ trans('cruds.property.fields.slug') }}</label>
                            <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug', $property->slug) }}" required>
                            @if($errors->has('slug'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('slug') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.slug_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="category_id">{{ trans('cruds.property.fields.category') }}</label>
                            <select class="form-control select2" name="category_id" id="category_id">
                                @foreach($categories as $id => $category)
                                    <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $property->category->id ?? '') == $id ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.property.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description', $property->description) }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="price">{{ trans('cruds.property.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', $property->price) }}" step="0.01" required>
                            @if($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="tax">{{ trans('cruds.property.fields.tax') }}</label>
                            <input class="form-control" type="number" name="tax" id="tax" value="{{ old('tax', $property->tax) }}" step="0.01" required>
                            @if($errors->has('tax'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tax') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.tax_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="beds">{{ trans('cruds.property.fields.beds') }}</label>
                            <input class="form-control" type="number" name="beds" id="beds" value="{{ old('beds', $property->beds) }}" step="1" required>
                            @if($errors->has('beds'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('beds') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.beds_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="baths">{{ trans('cruds.property.fields.baths') }}</label>
                            <input class="form-control" type="number" name="baths" id="baths" value="{{ old('baths', $property->baths) }}" step="1" required>
                            @if($errors->has('baths'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('baths') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.baths_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="sqft">{{ trans('cruds.property.fields.sqft') }}</label>
                            <input class="form-control" type="number" name="sqft" id="sqft" value="{{ old('sqft', $property->sqft) }}" step="1" required>
                            @if($errors->has('sqft'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sqft') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.sqft_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="location_id">{{ trans('cruds.property.fields.location') }}</label>
                            <select class="form-control select2" name="location_id" id="location_id" required>
                                @foreach($locations as $id => $location)
                                    <option value="{{ $id }}" {{ (old('location_id') ? old('location_id') : $property->location->id ?? '') == $id ? 'selected' : '' }}>{{ $location }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('location'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('location') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.location_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="address">{{ trans('cruds.property.fields.address') }}</label>
                            <textarea class="form-control" name="address" id="address" required>{{ old('address', $property->address) }}</textarea>
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="city">{{ trans('cruds.property.fields.city') }}</label>
                            <input class="form-control" type="text" name="city" id="city" value="{{ old('city', $property->city) }}" required>
                            @if($errors->has('city'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('city') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.city_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="state">{{ trans('cruds.property.fields.state') }}</label>
                            <input class="form-control" type="text" name="state" id="state" value="{{ old('state', $property->state) }}" required>
                            @if($errors->has('state'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('state') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.state_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="lankmark">{{ trans('cruds.property.fields.lankmark') }}</label>
                            <input class="form-control" type="text" name="lankmark" id="lankmark" value="{{ old('lankmark', $property->lankmark) }}">
                            @if($errors->has('lankmark'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('lankmark') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.lankmark_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="pincode">{{ trans('cruds.property.fields.pincode') }}</label>
                            <input class="form-control" type="number" name="pincode" id="pincode" value="{{ old('pincode', $property->pincode) }}" step="1" required>
                            @if($errors->has('pincode'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pincode') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.pincode_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="featured" value="0">
                                <input type="checkbox" name="featured" id="featured" value="1" {{ $property->featured || old('featured', 0) === 1 ? 'checked' : '' }}>
                                <label for="featured">{{ trans('cruds.property.fields.featured') }}</label>
                            </div>
                            @if($errors->has('featured'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('featured') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.featured_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="notes">{{ trans('cruds.property.fields.notes') }}</label>
                            <textarea class="form-control" name="notes" id="notes">{{ old('notes', $property->notes) }}</textarea>
                            @if($errors->has('notes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.notes_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="other_informations">{{ trans('cruds.property.fields.other_informations') }}</label>
                            <textarea class="form-control" name="other_informations" id="other_informations">{{ old('other_informations', $property->other_informations) }}</textarea>
                            @if($errors->has('other_informations'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('other_informations') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.other_informations_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="gallery">{{ trans('cruds.property.fields.gallery') }}</label>
                            <div class="needsclick dropzone" id="gallery-dropzone">
                            </div>
                            @if($errors->has('gallery'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gallery') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.property.fields.gallery_helper') }}</span>
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
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.properties.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($property) && $property->photo)
      var file = {!! json_encode($property->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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
<script>
    var uploadedGalleryMap = {}
Dropzone.options.galleryDropzone = {
    url: '{{ route('admin.properties.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
      uploadedGalleryMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedGalleryMap[file.name]
      }
      $('form').find('input[name="gallery[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($property) && $property->gallery)
      var files = {!! json_encode($property->gallery) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
        }
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