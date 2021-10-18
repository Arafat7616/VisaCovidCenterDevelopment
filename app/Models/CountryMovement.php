<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryMovement extends Model
{
    protected $fillable = [
        'from_country',
        'to_country',
        'country_code',
        'status',
    ];

}
