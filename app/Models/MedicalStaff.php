<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalStaff extends Model
{
    protected $fillable = [
        'center_id',
        'users_id',
        'user_type_id',
        'status',
    ];
}
