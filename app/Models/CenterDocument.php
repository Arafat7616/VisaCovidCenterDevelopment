<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CenterDocument extends Model
{
    protected $fillable = [
        'user_id',
        'center_id',
        'rapid_pcr_center_id',
        'rapid_pcr_document',
        'document',
        'status'
    ];

    public function center()
    {
        return $this->belongsTo(Center::class, 'center_id');
    }

    public function rapidPCRCenter()
    {
        return $this->belongsTo(RapidPCRCenter::class, 'rapid_pcr_center_id');
    }
}
