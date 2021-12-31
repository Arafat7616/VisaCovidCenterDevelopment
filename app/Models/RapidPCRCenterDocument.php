<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RapidPCRCenterDocument extends Model
{
    protected $fillable = [
        'user_id',
        'rapid_p_c_r_center_id',
        'document',
        'status'
    ];

    public function rapidPCRCenter()
    {
        return $this->belongsTo(RapidPCRCenter::class, 'rapid_p_c_r_center_id');
    }
}
