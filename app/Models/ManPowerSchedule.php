<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManPowerSchedule extends Model
{
    protected $fillable = [
        'type',
        'morning_starting_time',
        'morning_ending_time',
        'day_starting_time',
        'day_ending_time',
        'total_volunteer',
        'date',
        'pcr_time',
        'vaccine_time',
        'booster_time',
        'center_id'
    ];
}
