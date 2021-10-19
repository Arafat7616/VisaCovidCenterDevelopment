<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisteredController extends Controller
{
    public function pcr(){
        return view('Volunteer.registered.pcr');
    }

    public function vaccine(){
        return view('Volunteer.registered.vaccine');
    }

    public function booster(){
        return view('Volunteer.registered.booster');
    }
}
