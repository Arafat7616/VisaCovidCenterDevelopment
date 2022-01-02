<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RapidPCRPrice extends Model
{
    protected $fillable = [
        'pcr_normal',
        'pcr_premium',
        'rapid_pcr_center_id',
        'status'
    ];

    public function rapidPcrCenter()
    {
        return $this->belongsTo(RapidPCRCenter::class, 'rapid_pcr_center_id');
    }
}
