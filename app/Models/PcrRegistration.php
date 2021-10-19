<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PcrRegistration extends Model
{
    protected $fillable = [
        'registration_type (nor, pre)',
        'last_tested_date',
        'last_tested_result',
        'report',
        'status',
        'user_id',
        'center_id'
    ];
}
