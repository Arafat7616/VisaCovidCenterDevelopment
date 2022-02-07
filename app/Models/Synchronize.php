<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Synchronize extends Model
{
    protected $fillable = [
        'synchronize_rule',
        'status'
    ];
}
