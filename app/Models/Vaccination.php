<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    protected $fillable = [
        'name_of_vaccine',
        'date_of_first_dose',
        'date_of_second_dose',
        'antibody_last_date',
        'status',
        'user_id',
        'center_id',
        'serve_by_id',
    ];
}
