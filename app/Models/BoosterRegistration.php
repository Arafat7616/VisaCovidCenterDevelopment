<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoosterRegistration extends Model
{
    protected $fillable = [
        'name_of_vaccine',
        'registration_type (nor, pre)',
        'date',
        'antibody_last_date',
        'users_id',
        'center_id',
        'staff_id',
        'status',
    ];
}
