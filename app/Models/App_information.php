<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App_information extends Model
{
    protected $fillable = [
        'name_of_vaccine', 'date_of_first_dose', 'date_of_second_dose', 'antibody_last_date', 'user_id', 'center_id', 'status'
    ];

}
