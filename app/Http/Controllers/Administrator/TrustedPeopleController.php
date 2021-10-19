<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use App\TrustedPeople;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
            'message' => 'Successfully Data stored',
            'phone' => $request->phone
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
                'message' => 'OTP Successfully verified',
                'phone' => $request->phone
            ]);
        }else{
            return response()->json([
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
    public function edit(TrustedPeople $trustedPeople)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrustedPeople  $trustedPeople
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrustedPeople $trustedPeople)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrustedPeople  $trustedPeople
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrustedPeople $trustedPeople)
    {
        //
    }
}
