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
