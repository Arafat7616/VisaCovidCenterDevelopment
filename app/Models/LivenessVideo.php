<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LivenessVideo extends Model
{
    protected $fillable = [
        'video',
        'type (pcr, vacci, booster)',
        'date',
        'users_id',
        'center_id',
        'medical_staff_id',
        'status',
    ];
}
