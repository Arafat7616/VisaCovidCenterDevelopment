<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CenterDocument;
use App\Models\Center;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CenterRegistrationController extends Controller
{

    public function getStateList($country_id)
    {
        $state = State::where('country_id', $country_id)->get();
        return $state;
    }

    public function getCityList($state_id)
    {
        $city = City::where('state_id', $state_id)->get();
        return $city;
    }

    public function centerRegister()
    {
        $countries = Country::all();
        return view('auth.center-register', compact('countries'));
    }

    public function centerRegisterDataStore(Request $request)
    {
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
            'password' => 'min:6',
            'confirmPassword' => 'required_with:password|same:password|min:6',
            'tradeLicenseNumber'  => 'required',
            'document1' => 'nullable:mimes:pdf',
            'document2' => 'nullable:mimes:pdf',
            'document3' => 'nullable:mimes:pdf',
        ]);

        // center data store
        $center = new Center();
        $center->name = $request->centerName;
        $center->email = $request->centerEmail;

        if (is_numeric($request->country)) {
            $center->country_id = $request->country;
        }
        if (is_numeric($request->state)) {
            $center->state_id = $request->state;
        }
        if (is_numeric($request->city)) {
            $center->city_id = $request->city;
        }

        $center->trade_licence_no = $request->tradeLicenseNumber;
        $center->address = $request->address;
        $center->zip_code = $request->zipCode;
        $center->map_location = $request->mapLocation;
        $center->status = false;
        $center->varification_status = false;
        $center->save();

        // user data store
        $user = new User();
        $user->name = $request->personName;
        $user->email = $request->personEmail;
        $user->phone = $request->personPhone;
        $user->center_id = $center->id;
        $user->user_type = 'administrator';
        $user->password = Hash::make($request->password);
        $user->save();

        // user info data store
        $userInfo = new UserInfo();
        $userInfo->nid_no = $request->personNID;
        $userInfo->user_id = $user->id;
        if (is_numeric($request->country)) {
            $userInfo->country_id = $request->country;
        }
        if (is_numeric($request->state)) {
            $userInfo->state_id = $request->state;
        }
        if (is_numeric($request->city)) {
            $userInfo->city_id = $request->city;
        }

        $userInfo->save();

        // document data store
        if ($request->hasFile('document1')) {
            $document = new CenterDocument();
            $pdf             = $request->document1;
            $folder_path       = 'uploads/images/documents/';
            $pdf_new_name    = Str::random(20) . '-' . now()->timestamp . '.' . $pdf->getClientOriginalExtension();
            // save to server
            $request->document1->move(public_path($folder_path), $pdf_new_name);
            $document->document   = $folder_path . $pdf_new_name;
            $document->user_id   = $user->id;
            $document->status   = 1;
            $document->save();
        }
        if ($request->hasFile('document2')) {
            $document = new CenterDocument();
            $pdf             = $request->document2;
            $folder_path       = 'uploads/images/documents/';
            $pdf_new_name    = Str::random(20) . '-' . now()->timestamp . '.' . $pdf->getClientOriginalExtension();
            // save to server
            $request->document2->move(public_path($folder_path), $pdf_new_name);
            $document->document   = $folder_path . $pdf_new_name;
            $document->user_id   = $user->id;
            $document->status   = 1;
            $document->save();
        }
        if ($request->hasFile('document3')) {
            $document = new CenterDocument();
            $pdf             = $request->document3;
            $folder_path       = 'uploads/images/documents/';
            $pdf_new_name    = Str::random(20) . '-' . now()->timestamp . '.' . $pdf->getClientOriginalExtension();
            // save to server
            $request->document3->move(public_path($folder_path), $pdf_new_name);
            $document->document   = $folder_path . $pdf_new_name;
            $document->user_id   = $user->id;
            $document->status   = 1;
            $document->save();
        }

        return response()->json([
            'type' => 'success',
            'message' => 'Successfully Data stored',
        ]);
    }
}
