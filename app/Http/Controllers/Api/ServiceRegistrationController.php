<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booster;
use App\Models\ManPowerSchedule;
use App\Models\PcrTest;
use App\Models\ServiceAvailableNumber;
use App\Models\User;
use App\Models\Vaccination;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceRegistrationController extends Controller
{
    public function vaccineRegistration(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $centerId = $userArray['center_id'];
        $date = $userArray['date'];

        $user = User::where('phone', $phone)->select(['id'])->first();
        $existVaccination = Vaccination::where('user_id', $user->id)->first();

        if ($existVaccination)
        {
            return response()->json([
                "message"=>"You have already registered for Vaccination. Thank you",
                "status"=>"2",
            ]);
        }

        $registrationCheck = ManPowerSchedule::where('center_id', $centerId)->where('date', $date)->select(['vaccine_available_set', 'id'])->first();

        if ($registrationCheck==null){
            return response()->json([
                "message"=>"Sorry ! Not available.Please Select another date",
                "status"=>"0",
            ]);
        }elseif(!$registrationCheck->vaccine_available_set > 0)
        {
            return response()->json([
                "message"=>"Sorry ! Not available. Please Select another date",
                "status"=>"0",
            ]);

        }else{


            $vaccine = new Vaccination();
            $vaccine->user_id = $user->id;
            $vaccine->center_id = $centerId;
            $vaccine->date_of_registration = Carbon::parse($date);
            $vaccine->registration_type = "normal";

            if ($vaccine->save())
            {
                ManPowerSchedule::find($registrationCheck->id)->decrement('vaccine_available_set');

                // send sms via helper function
                send_sms('Congratulation !! You are successfully registration for Vaccination. ', $phone);

                return response()->json([
                    "message"=>"You have successfully registration for Vaccination",
                    "status"=>"1",
                ]);
            }else{
                return response()->json([
                    "message"=>"Something wrong",
                    "status"=>"0",
                ]);
            }
        }
    }

    public function prcRegistration(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $centerId = $userArray['center_id'];
        $date = $userArray['date'];

        $user = User::where('phone', $phone)->select(['id'])->first();

        $existPcr= PcrTest::where('user_id', $user->id)->first();
        if ($existPcr)
        {
            return response()->json([
                "message"=>"You have already registered for PCR Test. Thank you",
                "status"=>"2",
            ]);
        }

        $registrationCheck = ManPowerSchedule::where('center_id', $centerId)->where('date', $date)->select(['pcr_available_set', 'id'])->first();

        if ($registrationCheck==null){
            return response()->json([
                "message"=>"Sorry ! Not available.Please Select another date",
                "status"=>"0",
            ]);
        }elseif(!$registrationCheck->vaccine_available_set > 0)
        {
            return response()->json([
                "message"=>"Sorry ! Not available. Please Select another date",
                "status"=>"0",
            ]);

        }else {

            $pcr = new PcrTest();
            $pcr->user_id = $user->id;
            $pcr->center_id = $centerId;
            $pcr->date_of_registration = Carbon::parse($date);
            $pcr->registration_type = "normal";

            if ($pcr->save()) {

                ManPowerSchedule::find($registrationCheck->id)->decrement('pcr_available_set');

                // send sms via helper function
                send_sms('Congratulation !! You are successfully registration for PCR Test. ', $phone);

                return response()->json([
                    "message" => "You have successfully registration for PCR",
                    "status" => "1",
                ]);
            } else {
                return response()->json([
                    "message" => "Something wrong",
                    "status" => "0",
                ]);
            }
        }
    }

    public function boosterRegistration(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $centerId = $userArray['center_id'];
        $date = $userArray['date'];

        $user = User::where('phone', $phone)->select(['id'])->first();
        $existBooster= Booster::where('user_id', $user->id)->first();
        if ($existBooster)
        {
            return response()->json([
                "message"=>"You have already registration for Pcr Booster. Thank You",
                "status"=>"2",
            ]);
        }

        $registrationCheck = ManPowerSchedule::where('center_id', $centerId)->where('date', $date)->select(['booster_available_set', 'id'])->first();

        if ($registrationCheck==null){
            return response()->json([
                "message"=>"Sorry ! Not available.Please Select another date",
                "status"=>"0",
            ]);
        }elseif(!$registrationCheck->booster_available_set > 0)
        {
            return response()->json([
                "message"=>"Sorry ! Not available. Please Select another date",
                "status"=>"0",
            ]);

        }else {
            $booster = new Booster();
            $booster->user_id = $user->id;
            $booster->center_id = $centerId;
            $booster->date_of_registration = Carbon::parse($date);
            $booster->registration_type = "normal";

            if ($booster->save()) {

                ManPowerSchedule::find($registrationCheck->id)->decrement('booster_available_set');

                // send sms via helper function
                send_sms('Congratulation !! You are successfully registration for Booster. ', $phone);

                return response()->json([
                    "message" => "You have successfully registration for Booster",
                    "status" => "1",
                ]);
            } else {
                return response()->json([
                    "message" => "Something wrong",
                    "status" => "0",
                ]);
            }
        }

    }
}
