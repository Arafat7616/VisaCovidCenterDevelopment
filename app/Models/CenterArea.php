<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CenterArea extends Model
{
    protected $fillable = [
        'id',
        'title',
        'minimum_space',
        'maximum_space',
        'category',
        'status',
    ];
}
