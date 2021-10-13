<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'dob', 'gender', 'nid_no', 'passport_no', 'father_name', 'mother_name', 'blood_group', 'present_address', 'permanent_address', 'country', 'state', 'city', 'user_id'
    ];
}
