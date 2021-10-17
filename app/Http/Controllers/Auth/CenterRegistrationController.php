<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
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
            'country'  => 'nullable',
            'state'  => 'nullable',
            'city'  => 'nullable',
            'zipCode'  => 'required',
            'hotLine'  => 'required',
            'centerEmail'  => 'required|email',
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

        $center = new Center();
        $center->name = $request->centerName;
        $center->email = $request->centerEmail;

        if(is_numeric($request->country)){
            $center->country_id = $request->country;
        }

        if(is_numeric($request->state)){
            $center->country_id = $request->state;
        }

        if(is_numeric($request->city)){
            $center->country_id = $request->city;
        }
        $center->address = $request->address;
        $center->zip_code = $request->zipCode;
        $center->map_location = $request->mapLocation;
        $center->status = false;
        $center->save();

        $user = new User();
        $user->name = $request->personName;



        return response()->json([
            'type' => 'success',
            'message' => 'You can change own status.',
        ]);


    }
}
