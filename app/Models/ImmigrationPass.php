<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImmigrationPass extends Model
{
    protected $fillable = [
        'user_id',
        'user_center_id',
        'immigration_center_id',
        'date',
        'status',
    ];

    public function passedUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
