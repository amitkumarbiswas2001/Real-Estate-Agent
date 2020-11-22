<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class PropertyComment extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'property_comments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'rate',
        'comment',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const RATE_RADIO = [
        '1' => '1 Star',
        '2' => '2 Star',
        '3' => '3 Star',
        '4' => '4 Star',
        '5' => '5 Star',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
