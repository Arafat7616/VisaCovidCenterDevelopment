<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booster extends Model
{
    protected $fillable = [
        'name_of_vaccine',
        'registration_type',
        'date',
        'antibody_last_date',
        'user_id',
        'center_id',
        'served_by_id',
        'status',
    ];

    public function center()
    {
        return $this->belongsTo(Center::class, 'center_id');
    }
}
