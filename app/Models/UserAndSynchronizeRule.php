<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAndSynchronizeRule extends Model
{
    protected $fillable = [
        'user_id',
        'synchronize_id'
    ];

    public function rules()
    {
        return $this->belongsTo(Synchronize::class, 'synchronize_id');
    }
}
