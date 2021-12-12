<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CenterVaccineName extends Model
{
    protected $fillable = ['center_id', 'city_id', 'vaccineName', 'status'];
}
