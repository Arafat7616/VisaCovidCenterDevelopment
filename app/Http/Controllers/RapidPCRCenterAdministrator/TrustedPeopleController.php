<?php

namespace App\Http\Controllers\RapidPCRCenterAdministrator;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use App\Models\UserInfo;
use App\TrustedPeople;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class TrustedPeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('RapidPCRCenterAdministrator.trustedMedicalAssistant.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'passport'  => 'required',
            'user_type'  => 'required',
            'phone'  => 'required|unique:users,phone',
            'nid'  => 'required',
        ]);

        $user = new User();
        $user->phone = $request->phone;
        $user->otp = rand(100000, 1000000);
        $user->user_type = $request->user_type;
        $user->rapid_pcr_center_id = Auth::user()->rapid_pcr_center_id;
        if ($user->save()) {
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
            /*$session_user = Session::get('user');*/
            $userInfo = new UserInfo();
            $userInfo->user_id  = $user->id;
            $userInfo->passport_no = $request->passport;
            $userInfo->nid_no = $request->nid;
            $userInfo->save();
        }

        return response()->json([
            'type' => 'success',
            'message' => 'Send otp in your phone (' . $user->phone . ')',
        ]);
    }

    public function verification(Request $request)
    {
        $request->validate([
            'otp'  => 'required',
            'phone'  => 'required',
        ]);

        $verification = User::where('phone', $request->phone)->where('otp', $request->otp)->first();

        if ($verification) {
            $verification->otp_verified_at = Carbon::now();
            $verification->save();

            return response()->json([
                'type' => 'success',
                'message' => 'OTP Successfully verified',
                'phone' => $request->phone
            ]);
        } else {
            return response()->json([
                'type' => 'error',
                'message' => 'OTP Failed verified. Please Insert correct OTP',
            ]);
        }
    }

    public function resendOtp(Request $request){
        $user = User::where('phone', $request->phone)->first();
        $user->otp = rand(100000, 1000000);

        if ($user->save()) {
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
            return response()->json([
                'type' => 'success',
                'message' => 'Send otp in your phone (' . $user->phone . ')',
            ]);
        }else{            
            return response()->json([
                'type' => 'error',
                'message' => 'Sorry Credintial is invalid !',
            ]);
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrustedPeople  $trustedPeople
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrustedPeople  $trustedPeople
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $userInfo = UserInfo::where('user_id', $user->id)->first();
        $countries = Country::all();
        $cities = City::all();
        $states = State::all();
        return view('RapidPCRCenterAdministrator.trustedMedicalAssistant.edit', compact('user', 'userInfo', 'countries', 'cities', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrustedPeople  $trustedPeople
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request;
        $request->validate([
            'name'  => 'required',
            'father_name'  => 'required',
            'passport_no'  => 'required',
            'nid_no'  => 'required',
            'country_id'  => 'required',
            'state_id'  => 'required',
            'city_id'  => 'required',
            'blood_group'  => 'required',

            'email'  => 'required',
            'dob'  => 'required',
            'phone'  => 'required',
            'gender'  => 'required',
            'present_address'  => 'required',
            'permanent_address'  => 'required',
            'user_type'  => 'required',
        ]);


        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->save();


        $userInfo = UserInfo::where('id', $request->user_info_id)->first();
        $userInfo->passport_no = $request->passport_no;
        $userInfo->dob = $request->dob;
        $userInfo->blood_group = $request->blood_group;
        $userInfo->gender = $request->gender;
        $userInfo->nid_no = $request->nid_no;
        $userInfo->father_name = $request->father_name;
        $userInfo->mother_name  = $request->mother_name;
        $userInfo->present_address  = $request->present_address;
        $userInfo->permanent_address  = $request->permanent_address;
        $userInfo->country_id  = $request->country_id;
        $userInfo->state_id  = $request->state_id;
        $userInfo->city_id  = $request->city_id;
        $userInfo->save();

        Session::flash('message', 'Successfully Updated!');

        //        return redirect()->route('rapidPcrCenterAdministrator.dashboard')->withSuccess('Successfully created');
        return redirect()->route('rapidPcrCenterAdministrator.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrustedPeople  $trustedPeople
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        try {
            if ($user->image != null) {
                File::delete(public_path($user->image)); //Old image delete
            }
            $user->delete();

            return response()->json([
                'type' => 'success',
                'message' => 'Successfully Deleted !!',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'type' => 'error',
            ]);
        }
    }
}
