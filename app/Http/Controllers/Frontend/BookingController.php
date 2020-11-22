<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBookingRequest;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\Property;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BookingController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('booking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookings = Booking::all();

        return view('frontend.bookings.index', compact('bookings'));
    }

    public function create()
    {
        abort_if(Gate::denies('booking_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $properties = Property::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.bookings.create', compact('customers', 'properties'));
    }

    public function store(StoreBookingRequest $request)
    {
        $booking = Booking::create($request->all());

        if ($request->input('document', false)) {
            $booking->addMedia(storage_path('tmp/uploads/' . $request->input('document')))->toMediaCollection('document');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $booking->id]);
        }

        return redirect()->route('frontend.bookings.index');
    }

    public function edit(Booking $booking)
    {
        abort_if(Gate::denies('booking_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $properties = Property::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $booking->load('customer', 'property');

        return view('frontend.bookings.edit', compact('customers', 'properties', 'booking'));
    }

    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $booking->update($request->all());

        if ($request->input('document', false)) {
            if (!$booking->document || $request->input('document') !== $booking->document->file_name) {
                if ($booking->document) {
                    $booking->document->delete();
                }

                $booking->addMedia(storage_path('tmp/uploads/' . $request->input('document')))->toMediaCollection('document');
            }
        } elseif ($booking->document) {
            $booking->document->delete();
        }

        return redirect()->route('frontend.bookings.index');
    }

    public function show(Booking $booking)
    {
        abort_if(Gate::denies('booking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $booking->load('customer', 'property');

        return view('frontend.bookings.show', compact('booking'));
    }

    public function destroy(Booking $booking)
    {
        abort_if(Gate::denies('booking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $booking->delete();

        return back();
    }

    public function massDestroy(MassDestroyBookingRequest $request)
    {
        Booking::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('booking_create') && Gate::denies('booking_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Booking();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
