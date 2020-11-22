@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.property.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.properties.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $property->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.photo') }}
                                    </th>
                                    <td>
                                        @if($property->photo)
                                            <a href="{{ $property->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $property->photo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $property->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.slug') }}
                                    </th>
                                    <td>
                                        {{ $property->slug }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.category') }}
                                    </th>
                                    <td>
                                        {{ $property->category->category ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $property->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.price') }}
                                    </th>
                                    <td>
                                        {{ $property->price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.tax') }}
                                    </th>
                                    <td>
                                        {{ $property->tax }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.beds') }}
                                    </th>
                                    <td>
                                        {{ $property->beds }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.baths') }}
                                    </th>
                                    <td>
                                        {{ $property->baths }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.sqft') }}
                                    </th>
                                    <td>
                                        {{ $property->sqft }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.location') }}
                                    </th>
                                    <td>
                                        {{ $property->location->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $property->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.city') }}
                                    </th>
                                    <td>
                                        {{ $property->city }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.state') }}
                                    </th>
                                    <td>
                                        {{ $property->state }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.lankmark') }}
                                    </th>
                                    <td>
                                        {{ $property->lankmark }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.pincode') }}
                                    </th>
                                    <td>
                                        {{ $property->pincode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.featured') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $property->featured ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.notes') }}
                                    </th>
                                    <td>
                                        {{ $property->notes }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.other_informations') }}
                                    </th>
                                    <td>
                                        {{ $property->other_informations }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.property.fields.gallery') }}
                                    </th>
                                    <td>
                                        @foreach($property->gallery as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.properties.index') }}">
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