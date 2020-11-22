<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;

class Booking extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'bookings';

    protected $appends = [
        'document',
    ];

    protected $dates = [
        'booking_form',
        'booking_until',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const BOOKING_STATUS_RADIO = [
        'accepted' => 'Accepted',
        'rejected' => 'Rejected',
        'pending'  => 'Pending',
    ];

    const TYPE_SELECT = [
        'full_paid'           => 'Full Paid',
        'monthly_installment' => 'Monthly Installment',
        'yearly_installment'  => 'Yearly Installment',
    ];

    protected $fillable = [
        'customer_id',
        'property_id',
        'amount',
        'type',
        'paid_amount',
        'payable_amount',
        'booking_form',
        'booking_until',
        'booking_status',
        'document_number',
        'document_verified',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function generateTwoFactorCode()
    {
        $this->timestamps            = false;
        $this->two_factor_code       = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(15);
        $this->save();
    }

    public function resetTwoFactorCode()
    {
        $this->timestamps            = false;
        $this->two_factor_code       = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function getBookingFormAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBookingFormAttribute($value)
    {
        $this->attributes['booking_form'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getBookingUntilAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBookingUntilAttribute($value)
    {
        $this->attributes['booking_until'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDocumentAttribute()
    {
        return $this->getMedia('document')->last();
    }
}
