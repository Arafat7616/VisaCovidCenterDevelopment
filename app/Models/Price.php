<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'pcr_normal',
        'vaccine_normal',
        'booster_normal',
        'pcr_premium',
        'vaccine_premium',
        'booster_premium',
        'center_id',
        'status'
    ];

    public function center()
    {
        return $this->belongsTo(Center::class, 'center_id');
    }
}
