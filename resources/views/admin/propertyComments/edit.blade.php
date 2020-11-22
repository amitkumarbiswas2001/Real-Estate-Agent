@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.propertyComment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.property-comments.update", [$propertyComment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.propertyComment.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $propertyComment->user->id ?? '') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.propertyComment.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.propertyComment.fields.rate') }}</label>
                @foreach(App\Models\PropertyComment::RATE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('rate') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="rate_{{ $key }}" name="rate" value="{{ $key }}" {{ old('rate', $propertyComment->rate) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="rate_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('rate'))
                    <span class="text-danger">{{ $errors->first('rate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.propertyComment.fields.rate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comment">{{ trans('cruds.propertyComment.fields.comment') }}</label>
                <textarea class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" id="comment">{{ old('comment', $propertyComment->comment) }}</textarea>
                @if($errors->has('comment'))
                    <span class="text-danger">{{ $errors->first('comment') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.propertyComment.fields.comment_helper') }}</span>
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