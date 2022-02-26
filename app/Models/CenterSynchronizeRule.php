<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CenterSynchronizeRule extends Model
{
    protected $fillable = [
        'id',
        'center_id',
        'rapid_pcr_center_id',
        'synchronize_id',
        'city_id'
    ];
}
