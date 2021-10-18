<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $fillable = [
        'pcr_normal',
        'vaccine_normal',
        'booster_normal',
        'pcr_premimum',
        'vaccine_premimum',
        'boster_premimum',
        'center_id',
        'status'
    ];
}
