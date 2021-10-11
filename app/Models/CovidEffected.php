<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CovidEffected extends Model
{
    protected $fillable = [
        'user_id', 'document', 'effected_date', 'recovery_date', 'effect_status'
    ];
}
