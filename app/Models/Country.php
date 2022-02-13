<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'sortname',
        'name',
        'phonecode'
    ];

    public function countryBasedSynchronizeRules()
    {
        return $this->hasMany(CountryAndSynchronizeRule::class, 'country_id');
    }
}
