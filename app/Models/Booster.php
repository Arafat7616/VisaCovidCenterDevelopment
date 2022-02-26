<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booster extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name_of_vaccine',
        'registration_type',
        'date',
        'antibody_last_date',
        'user_id',
        'center_id',
        'served_by_id',
        'synchronize_id',
        'status',
    ];

    public function center()
    {
        return $this->belongsTo(Center::class, 'center_id');
    }

    public function rapidPcrCenter()
    {
        return $this->belongsTo(RapidPCRCenter::class, 'rapid_pcr_center_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function servedBy()
    {
        return $this->belongsTo(User::class, 'served_by_id');
    }
}
