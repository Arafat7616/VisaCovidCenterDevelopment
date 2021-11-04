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
        'volunteer_for_pcr',
        'volunteer_for_vaccine',
        'volunteer_for_booster',
        'date',
        'pcr_time',
        'vaccine_time',
        'booster_time',
        'center_id'
    ];

    public function center()
    {
        return $this->belongsTo(Center::class, 'center_id');
    }
}
