<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booster;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BoosterCenterController extends Controller
{
    public function registeredList(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $user = User::where('phone', $phone)->select(['center_id', 'id'])->first();
        $boosterRegisteredLists = Booster::where('center_id', $user->center_id)->where('antibody_last_date', null)->select(['user_id', 'id', 'name_of_vaccine'])->get();

        if (empty($boosterRegisteredLists))
        {
            return response()->json([
                "message" => "No data found",
                "status" => '0',
            ]);
        }else{

            $myData = [];
            foreach($boosterRegisteredLists as $key=>$boosterRegisteredList)
            {
                $regUser = User::where('id', $boosterRegisteredList->user_id)->select(['name','phone'])->first();
                $myData[$key]['user_name'] = $regUser->name;
                $myData[$key]['user_phone'] = $regUser->phone;
                $myData[$key]['application_id'] = (string)$boosterRegisteredList->id;
                $myData[$key]['name_of_vaccine'] = $boosterRegisteredList->name_of_vaccine;
            }

            return response()->json([
                "myData" => $myData,
                "status" => '1',
            ]);
        }
    }

    public function boosterUserOtp(Request $request)
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

    public function boosterVolunteerOtp(Request $request)
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

    public function boosterFrom(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $applicationId = $userArray['applicationId'];

        $user = User::where('phone', $phone)->select('id')->first();
        $booster = Booster::where('id', $applicationId)->first();

        $booster->date = Carbon::now();
        $booster->antibody_last_date = Carbon::now()->addMonths(1);
        $booster->served_by_id = $user->id;
        $booster->save();

        return response()->json([
            "message"=>'Successfully update',
            "status"=>'1',
        ]);
    }
}
