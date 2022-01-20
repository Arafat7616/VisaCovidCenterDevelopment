<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImmigrationCenter extends Model
{
    protected $fillable = [
        'name',
        'email',
        'country_id',
        'state_id',
        'city_id',
        'airport_name',
        'status',
    ];
}
