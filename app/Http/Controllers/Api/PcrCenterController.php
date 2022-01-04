<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PcrTest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PcrCenterController extends Controller
{
    public function registeredList(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $user = User::where('phone', $phone)->select(['center_id', 'id'])->first();
        $pcrRegisteredLists = PcrTest::where('center_id', $user->center_id)->where('date_of_pcr_test', null)->select(['user_id', 'id'])->get();

        if (empty($pcrRegisteredLists))
        {
            return response()->json([
                "message" => "No data found",
                "status" => '0',
            ]);
        }else{

            $myData = [];
            foreach($pcrRegisteredLists as $key=>$pcrRegisteredList)
            {
                $regUser = User::where('id', $pcrRegisteredList->user_id)->select(['name','phone'])->first();
                $myData[$key]['user_name'] = $regUser->name;
                $myData[$key]['user_phone'] = $regUser->phone;
                $myData[$key]['application_id'] = (string)$pcrRegisteredList->id;
            }

            return response()->json([
                "myData" => $myData,
                "status" => '1',
            ]);
        }
    }

    public function centerOptSend(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $user = User::where('phone', $phone)->first();

        $otp = rand(100000, 990000);
        $user->otp = $otp;
        $user->save();
        $message = 'Welcome to Visa Covid , your otp is : '. $otp.'. Please don\'t share your otp';
        //send_sms($message, $phone);

        return response()->json([
            "message" => "Send otp in your phone : ".$user->phone.'. Please don\'t share your otp',
            "status" => "1"
        ]);
    }

    public function centerOptCheck(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $otp = $userArray['otp'];

        $existUser = User::where('phone', $phone)->first();

        if ($otp == $existUser->otp)
        {
            $existUser->status = "1";
            $existUser->otp_verified_at = Carbon::now();
            $existUser->update();

            return response()->json([
                "message"=>"Otp successfully verified",
                "status"=>"1",
            ]);
        }else{
            return response()->json([
                "message"=>"Please insert validate otp",
                "status"=>"0",
            ]);
        }
    }

    public function pcrFrom(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $applicationId = $userArray['applicationId'];

        $user = User::where('phone', $phone)->select('id')->first();
        $pcr = PcrTest::where('id', $applicationId)->first();

        $pcr->date_of_pcr_test = Carbon::now();
        $pcr->tested_by = $user->id;
        $pcr->save();

        return response()->json([
            "message"=>'Successfully update',
            "status"=>'1',
        ]);
    }
}
