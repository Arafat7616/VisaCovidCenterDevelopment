<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Airport;
use App\Models\CenterDocument;
use App\Models\Center;
use App\Models\CenterArea;
use App\Models\City;
use App\Models\Country;
use App\Models\Price;
use App\Models\State;
use App\Models\User;
use App\Models\UserInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CenterRegistrationController extends Controller
{

    public function getStateList($country_id)
    {
        $states = State::where('country_id', $country_id)->get();
        return $states;
    }

    public function getCityList($state_id)
    {
        $cities = City::where('state_id', $state_id)->get();
        return $cities;
    }

    public function getAirportList($country_id)
    {
        $airports = Airport::where('country_id', $country_id)->get();
        return $airports;
    }


    public function centerRegister()
    {
        $countries = Country::all();
        $centerAreas = CenterArea::where('status', 1)->get();
        return view('auth.center-register', compact('countries','centerAreas'));
    }

    public function centerRegisterDataStore(Request $request)
    {
        // validation request data
        $request->validate([
            'centerName'  => 'required',
            'country'  => 'nullable',
            'state'  => 'nullable',
            'city'  => 'nullable',
            'space'  => 'required|numeric',
            'waitingSeatCapacity'  => 'required',
            'zipCode'  => 'required',
            'hotLine'  => 'required',
            'centerEmail'  => 'required|email|unique:centers,email',
            'personName'  => 'required',
            'personEmail'  => 'required|email|unique:users,email',
            'personNID'  => 'required',
            'personPhone'  => 'required',
            'password' => 'min:6',
            'confirmPassword' => 'required_with:password|same:password|min:6',
            'tradeLicenseNumber'  => 'required',
            'document1' => 'nullable:mimes:pdf',
            'document2' => 'nullable:mimes:pdf',
            'document3' => 'nullable:mimes:pdf',
        ]);

        if (is_numeric($request->space)) {

            $centerArea = CenterArea::where('minimum_space','<=',$request->space)->where('maximum_space','>=',$request->space)->first();

            if($centerArea){
                $center_area_id = $centerArea->id;
            }else{
                return response()->json([
                    'type' => 'error',
                    'message' => 'Opps somthing went wrong. ' . 'Your center space is too short',
                ]);
            }
        }else{
            return response()->json([
                'type' => 'error',
                'message' => 'Opps somthing went wrong. ' . 'Your center space should be number',
            ]);
        }

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

        if (is_numeric($request->waitingSeatCapacity)) {
            $center->waiting_seat_capacity = $request->waitingSeatCapacity;
        }

        $center->trade_licence_no = $request->tradeLicenseNumber;
        $center->address = $request->address;
        $center->space = $request->space;
        $center->zip_code = $request->zipCode;
        $center->map_location = $request->mapLocation;
        $center->center_area_id = $center_area_id;
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
        $user->otp = rand(100000, 1000000);
        $user->password = Hash::make($request->password);
        $user->save();
        try {
            // send sms via helper function
            send_sms('Welcome to Visa Covid, your otp is : ' . $user->otp, $user->phone);
        } catch (\Exception $exception) {
            return response()->json([
                'type' => 'error',
                'message' => 'Opps somthing went wrong. ' . $exception->getMessage(),
            ]);
        }

        Session::put('user', $user);

        $center->administrator_id =  $user->id;
        $center->save();

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

        $price = New Price();
        $price->center_id = $center->id;
        $price->status = "1";
        $price->save();


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
            $document->center_id   = $center->id;
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
            $document->center_id   = $center->id;
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
            $document->center_id   = $center->id;
            $document->status   = 1;
            $document->save();
        }

        return response()->json([
            'type' => 'success',
            'message' => 'Successfully Data stored',
        ]);
    }

    public function centerRegisterOptVerify(Request $request){
        $sessionUser = Session::get('user');
        // return response()->json([
        //     'type' => 'error',
        //     'message' => $sessionUser->id,
        // ]);
        if($request->otp == $sessionUser->otp){
            $sessionUser->otp_verified_at = Carbon::now();
            $sessionUser->save();
            return response()->json([
                'type' => 'success',
                'url' => route('login'),
                'message' => 'Otp verified successfully ',
            ]);
        }else{
            return response()->json([
                'type' => 'error',
                'message' => 'Opps somthing went wrong.Otp not verified ',
            ]);
        }
    }
}
