<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PremiumController extends Controller
{
    public function pcr(){
        return view('Volunteer.premium.pcr');
    }

    public function vaccine(){
        return view('Volunteer.premium.vaccine');
    }

    public function booster(){
        return view('Volunteer.premium.booster');
    }
}
