<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Center extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'country_id',
        'state_id',
        'city_id',
        'zip_code',
        'address',
        'map_location',
        'trade_licence_no',
        'status',
        'varification_status',
        'administrator_id',
        'center_area_id',
    ];

    public function documents()
    {
        return $this->hasMany(CenterDocument::class, 'center_id');
    }
    public function area()
    {
        return $this->belongsTo(CenterArea::class, 'center_area_id');
    }

    public function administrator()
    {
        return $this->belongsTo(User::class, 'administrator_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function price()
    {
        return $this->hasOne(Price::class, 'center_id');
    }
}
