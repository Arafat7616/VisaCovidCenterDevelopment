<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class CenterRegistrationController extends Controller
{

    public function getStateList($country_id){
        $state = State::where('country_id',$country_id)->get();
        return $state;
    }

    public function getCityList($state_id){
        $city = City::where('state_id',$state_id)->get();
        return $city;
    }

    public function centerRegister(){
        $countries = Country::all();
        return view('auth.center-register', compact('countries'));
    }

    public function centerRegisterDataStore(Request $request){
        $request->validate([
            'centerName'  => 'required',
            'country'  => 'required',
            'state'  => 'required',
            // 'city'  => '',
            'zipCode'  => 'required',
            'hotLine'  => 'required',
            'area'  => 'required',
            'personName'  => 'required',
            'personEmail'  => 'required',
            'personNID'  => 'required',
            'personPhone'  => 'required',
            'password'  => 'required',
            'confirmPassword'  => 'required',
            'tradeLicenseNumber'  => 'required',
            'document1' => 'nullable:mimes:pdf',
            'document2' => 'nullable:mimes:pdf',
            'document3' => 'nullable:mimes:pdf',
        ]);

        return response()->json([
            'type' => 'success',
            'message' => 'You can change own status.',
        ]);


    }
}
