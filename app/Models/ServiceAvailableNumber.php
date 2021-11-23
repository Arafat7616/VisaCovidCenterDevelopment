<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceAvailableNumber extends Model
{
    protected $fillable = [
        'center_id',
        'service_type',
        'date',
        'available_set',
    ];
}
