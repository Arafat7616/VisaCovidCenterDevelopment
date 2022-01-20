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
        'trusted_medical_assistant_for_pcr',
        'trusted_medical_assistant_for_vaccine',
        'trusted_medical_assistant_for_booster',
        'pcr_available_set',
        'vaccine_available_set',
        'booster_available_set',
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
