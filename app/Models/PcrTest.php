<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PcrTest extends Model
{
    protected $fillable = [
        'registration_type',
        'day_starting_time',
        'date_of_pcr_test',
        'pcr_result',
        'user_id',
        'center_id',
        'status',
    ];
}
