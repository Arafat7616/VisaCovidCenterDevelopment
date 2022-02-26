<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAndSynchronizeRule;
use App\Models\Vaccination;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VaccineCenterController extends Controller
{
    public function registeredFirstList(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $user = User::where('phone', $phone)->select(['center_id', 'id'])->first();
        $vaccineRegisteredLists = Vaccination::where('center_id', $user->center_id)->where('date_of_first_dose', null)->select(['user_id', 'id', 'name_of_vaccine','synchronize_id'])->get();

        if (empty($vaccineRegisteredLists))
        {
            return response()->json([
                "message" => "No data found",
                "status" => '0',
            ]);
        }else{
            $myData = [];
            foreach($vaccineRegisteredLists as $key=>$vaccineRegisteredList)
            {
                $regUser = User::where('id', $vaccineRegisteredList->user_id)->select(['name','phone'])->first();
                $myData[$key]['user_name'] = $regUser->name;
                $myData[$key]['user_phone'] = $regUser->phone;
                $myData[$key]['application_id'] = (string)$vaccineRegisteredList->id;
                $myData[$key]['name_of_vaccine'] = $vaccineRegisteredList->name_of_vaccine;
                $myData[$key]['synchronize_id'] = (string)$vaccineRegisteredList->synchronize_id;
            }
            return response()->json([
                "myData" => $myData,
                "status" => '1',
            ]);
        }
    }

    public function registeredSecondList(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $user = User::where('phone', $phone)->select(['center_id', 'id'])->first();
        $vaccineRegisteredLists = Vaccination::where('center_id', $user->center_id)->where('first_dose_status', '1')->where('date_of_second_dose', null)->select(['user_id', 'id', 'name_of_vaccine','synchronize_id'])->get();

        if (empty($vaccineRegisteredLists))
        {
            return response()->json([
                "message" => "No data found",
                "status" => '0',
            ]);
        }else{

            $myData = [];
            foreach($vaccineRegisteredLists as $key=>$vaccineRegisteredList)
            {
                $regUser = User::where('id', $vaccineRegisteredList->user_id)->select(['name','phone'])->first();
                $myData[$key]['user_name'] = $regUser->name;
                $myData[$key]['user_phone'] = $regUser->phone;
                $myData[$key]['application_id'] = (string)$vaccineRegisteredList->id;
                $myData[$key]['name_of_vaccine'] = $vaccineRegisteredList->name_of_vaccine;
                $myData[$key]['synchronize_id'] = (string)$vaccineRegisteredList->synchronize_id;
            }
            return response()->json([
                "myData" => $myData,
                "status" => '1',
            ]);
        }
    }

    public function vaccinationUserOtp(Request $request)
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

    public function vaccinationVolunteerOtp(Request $request)
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

    public function vaccinationFrom(Request $request)
    {

        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $applicationId = $userArray['applicationId'];
        $synchronize_id = $userArray['synchronizeId'];
        $serviceType = $userArray['serviceType'];

        $user = User::where('phone', $phone)->select('id')->first();
        $vaccine = Vaccination::where('id', $applicationId)->first();

        if ($serviceType === 'vaccineFirst')
        {
            $vaccine->date_of_first_dose = Carbon::now();
            $vaccine->first_dose_status = '1';
            $vaccine->first_served_by_id = $user->id;

        }else{
            $vaccine->date_of_second_dose = Carbon::now();
            $vaccine->antibody_last_date = Carbon::now()->addMonths(2);
            $vaccine->second_served_by_id = $user->id;

            // Synchronize record store
            UserAndSynchronizeRule::where('user_id', $vaccine->user_id)->where('synchronize_id', $synchronize_id)->delete();
            $userAndSynchronizeRule = new UserAndSynchronizeRule();
            $userAndSynchronizeRule->user_id = $vaccine->user_id;
            $userAndSynchronizeRule->synchronize_id = $synchronize_id;
            $userAndSynchronizeRule->save();
        }
        try {
            $vaccine->save();
            return response()->json([
                "message"=>'Successfully update',
                "status"=>'1',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "message"=>"Something went wrong .".$exception->getMessage(),
                "status"=>'0',
            ]);
        }
    }
}
