<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Synchronize extends Model
{
    protected $fillable = [
        'country_id', 'synchronize_rule', 'status'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
