<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = [
        'id',
        'country_id',
        'airport_name',
        'status',
    ];
}
