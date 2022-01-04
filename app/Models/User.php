<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'image',
        'user_type',
        'center_id',
        'otp',
        'status',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function center()
    {
        return $this->belongsTo(Center::class, 'center_id');
    }

    public function rapidPcrCenter()
    {
        return $this->belongsTo(RapidPCRCenter::class, 'rapid_pcr_center_id');
    }

    public function immigrationCenter()
    {
        return $this->belongsTo(ImmigrationCenter::class, 'immigration_center_id');
    }

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class, 'user_id');
    }

    public function vaccination()
    {
        return $this->hasOne(Vaccination::class, 'user_id');
    }

    public function pcrTest()
    {
        return $this->hasOne(PcrTest::class, 'user_id');
    }

    public function booster()
    {
        return $this->hasOne(Booster::class, 'user_id');
    }

}
