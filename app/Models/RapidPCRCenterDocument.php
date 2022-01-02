<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RapidPCRCenterDocument extends Model
{
    protected $fillable = [
        'user_id',
        'rapid_pcr_center_id',
        'document',
        'status'
    ];

    public function rapidPCRCenter()
    {
        return $this->belongsTo(RapidPCRCenter::class, 'rapid_pcr_center_id');
    }
}
