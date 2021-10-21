<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PcrTest extends Model
{
    protected $fillable = [
        'date_of_pcr_test',
        'pcr_result',
        'status',
        'user_id',
        'center_id'
    ];
}
