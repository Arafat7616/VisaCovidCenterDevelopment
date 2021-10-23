<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalStaff extends Model
{
    protected $fillable = [
        'center_id',
        'user_id',
        'user_type_id',
        'status',
    ];
}
