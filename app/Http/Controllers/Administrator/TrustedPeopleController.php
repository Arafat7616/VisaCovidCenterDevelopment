<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use App\TrustedPeople;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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
        return view('Administrator.volunteer.create');
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
            'phone'  => 'required',
            'nid'  => 'required',
            'center_id'  => 'required',
        ]);

        $user = new User();
        $user->phone = $request->phone;
        $user->otp = rand(100000,1000000);
        $user->user_type = $request->user_type;
        $user->center_id = $request->center_id;
        if ($user->save())
        {
            Session::put('user',$user);
            /*$session_user = Session::get('user');*/
            $userInfo = new UserInfo();
            $userInfo->user_id  = $user->id;
            $userInfo->passport_no = $request->passport;
            $userInfo->nid_no = $request->nid;
            $userInfo->save();
        }

        return response()->json([
            'type' => 'success',
            'message' => 'Send otp in your phone ('.$user->phone.')',
        ]);



    }

    public function verification(Request $request)
    {
        $request->validate([
            'otp'  => 'required',
            'phone'  => 'required',
        ]);

        $verification = User::where('phone', $request->phone)->where('otp', $request->otp)->first();

        if ($verification){
            $verification->otp_verified_at = Carbon::now();
            $verification->save();

            return response()->json([
                'type' => 'success',
                'message' => 'OTP Successfully verified',
                'phone' => $request->phone
            ]);
        }else{
            return response()->json([
                'type' => 'warning',
                'message' => 'OTP Failed verified. Please Insert correct OTP',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrustedPeople  $trustedPeople
     * @return \Illuminate\Http\Response
     */
    public function show(TrustedPeople $trustedPeople)
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
        return view('Administrator.volunteer.edit', compact('user', 'userInfo'));
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
        $request->validate([
            'name'  => 'required',
            'father_name'  => 'required',
            'passport_no'  => 'required',
            'nid_no'  => 'required',
            'country'  => 'required',
            'state'  => 'required',

            'email'  => 'required',
            'dob'  => 'required',
            'phone'  => 'required',
            'gender'  => 'required',
            'present_address'  => 'required',
        ]);

        $user = User::where('id', $id)->first();
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();

        /*if ($request->phone != null)
        {
            $user->phone = $request->phone;
        }*/

        $userInfo = UserInfo::where('id', $request->user_info_id)->first();
        $userInfo->passport_no = $request->passport;
        $userInfo->gender = $request->gender;
        $userInfo->nid_no = $request->nid;
        $userInfo->father_name = $request->father_name;
        $userInfo->mother_name  = $request->mother_name;
        $userInfo->permanent_address  = $request->permanent_address;
        $userInfo->country   = $request->country ;
        $userInfo->save();

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
            if ($user->image != null){
                File::delete(public_path($user->image)); //Old image delete
            }
            $user->delete();

            return response()->json([
                'type' => 'success',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
            ]);
        }
    }
}