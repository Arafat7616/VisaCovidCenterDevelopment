<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PcrTest extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'registration_type',
        'sample_collection_date',
        'date_of_pcr_test',
        'result_published_date',
        'pcr_result',
        'user_id',
        'center_id',
        'tested_by',
        'status',
    ];

    public function center()
    {
        return $this->belongsTo(Center::class, 'center_id');
    }

    public function testedBy()
    {
        return $this->belongsTo(Center::class, 'tested_by');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
