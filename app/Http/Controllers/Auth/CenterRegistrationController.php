<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CenterRegistrationController extends Controller
{

    public function centerRegister(){
        $countries = Country::all();
        return view('auth.center-register', compact('countries'));
    }

    public function centerRegistrationDataStore(Request $request){
        $request->validate([

            'enquiryEndDate'    =>  'required',
        ]);
    }
}
