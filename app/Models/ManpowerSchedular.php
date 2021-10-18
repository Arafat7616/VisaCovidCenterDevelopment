<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManpowerSchedular extends Model
{
    protected $fillable = [
        'type (regular or premium)',
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
