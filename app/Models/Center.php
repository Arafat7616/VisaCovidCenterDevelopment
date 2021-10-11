<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'country', 'zone', 'location', 'map_location' ,'status'
    ];
}
