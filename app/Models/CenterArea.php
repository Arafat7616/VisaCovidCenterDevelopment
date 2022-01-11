<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CenterArea extends Model
{
    protected $fillable = [
        'id',
        'title',
        'space',
        'category',
        'status',
    ];
}
