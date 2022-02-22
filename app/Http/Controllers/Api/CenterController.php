<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CenterController extends Controller
{
    public function login(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $password = $userArray['password'];


        $user = User::where('phone', $phone)->first();

        if ($user)
        {
            if ($user->user_type == 'trusted-medical-assistant' || $user->user_type == 'rapid-pcr-center-trusted-medical-assistant'){

                if (Hash::check($password, $user->password))
                {
                    $otp = rand(100000, 990000);
                    $user->otp = $otp;
                    $user->save();
                    $message = 'Welcome to Visa Covid , your otp is : '. $otp.'. Please don\'t share your otp';
                    //send_sms($message, $phone);

                    return response()->json([
                        "message" => "Send otp in your phone : ".$user->phone,
                        "phone" => $phone,
                        "status" => "1"
                    ]);
                }else{
                    return response()->json([
                        "status" => "0",
                        "message" => "Please insert correct password"
                    ]);
                }
            }else{
                return response()->json([
                    "message" => "Sorry ! Login only trusted medical assistant",
                    "status" => "0",
                ]);
            }
        }else{
            return response()->json([
                "message" => "Please insert correct phone or password",
                "status" => "0",
            ]);
        }
    }

    public function volunteerOtp(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $otp = $userArray['otp'];

        $existUser = User::where('phone', $phone)->first();
        if($existUser->center_id != null){
            $centerType = "normal";
        }elseif($existUser->rapid_pcr_center_id){
            $centerType = "rtpcr";
        }

        if ($otp == $existUser->otp)
        {
            $existUser->status = "1";
            $existUser->otp_verified_at = Carbon::now();
            $existUser->update();

            return response()->json([
                "message"=>"Otp successfully verified",
                "phone" => $existUser->phone,
                "status"=>"1",
                "loginStatus"=>"1",
                "centerType"=>$centerType,
            ]);
        }else{
            return response()->json([
                "message"=>"Please insert validate otp",
                "status"=>"0",
            ]);
        }
    }

    public function otpResend(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $existUser = User::where('phone', $phone)->first();

        if ($existUser)
        {
            $otp = rand(100000, 990000);
            $existUser->otp = $otp;
            $existUser->save();

            $message = 'Welcome to Visa Covid, your otp is : '. $otp.' Please don\'t share with other';
            send_sms($message, $phone);


            return response()->json([
                "message"=>"Otp send in : ".$phone,
                "phone"=>$request->phone,
                "status"=>"1",
            ]);
        }else{
            return response()->json([
                "message"=>"Please insert validate otp",
                "status"=>"0",
            ]);
        }

    }
}
