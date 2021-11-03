<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
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
    ];

    public function documents()
    {
        return $this->hasMany(CenterDocument::class, 'center_id');
    }
}
