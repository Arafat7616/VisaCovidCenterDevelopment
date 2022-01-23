<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booster;
use App\Models\Center;
use App\Models\CenterVaccineName;
use App\Models\ManPowerSchedule;
use App\Models\PcrTest;
use App\Models\ServiceAvailableNumber;
use App\Models\User;
use App\Models\Vaccination;
use App\Models\VaccineName;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class ServiceRegistrationController extends Controller
{

    public function vaccinationCenterSelect(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $cityId = $userArray['city_id'];
        $vaccineName = $userArray['vaccineName'];

        $centers = CenterVaccineName::where('city_id', $cityId)->where('vaccineName', $vaccineName)->select('center_id')->get();
        $centerInfo = [];

        $i = 0;
        foreach ($centers as $key=>$center)
        {
            $centerInfo[$key] = Center::where('id', $center->center_id)->select(['id', 'name'])->first();
        }

        if (!empty($centerInfo))
        {
            return response()->json([
                "centers"=>$centerInfo,
                "status"=>"1",
            ]);
        }else{
            return response()->json([
                "message"=>"Please select another City Or Vaccine",
                "status"=>"0",
            ]);
        }

    }

    public function vaccineName(){
        $vaccineName = VaccineName::where('status', '1')->select(['id', 'name'])->get();
        if (count($vaccineName) > 0)
        {
            return response()->json([
                "vaccineName"=>$vaccineName,
                "status"=>"1",
            ]);
        }else{
            return response()->json([
                "message"=>"Something wrong",
                "status"=>"0",
            ]);
        }
    }

    public function vaccineRegistration(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $centerId = $userArray['center_id'];
        $date = $userArray['date'];
        $nameOfVaccine = $userArray['vaccineName'];

        $user = User::where('phone', $phone)->select(['id', 'name'])->first();
        $existVaccination = Vaccination::where('user_id', $user->id)->first();

        if ($existVaccination)
        {
            return response()->json([
                "message"=>"You are already registered for Vaccination. Thank you",
                "status"=>"2",
            ]);
        }

        $registrationCheck = ManPowerSchedule::where('center_id', $centerId)->where('date', $date)->select(['vaccine_available_set', 'id'])->first();

        if ($registrationCheck==null){
            return response()->json([
                "message"=>"Sorry ! It is not available.Please Select another date",
                "status"=>"0",
            ]);
        }elseif(!$registrationCheck->vaccine_available_set > 0)
        {
            return response()->json([
                "message"=>"Sorry ! It is not available. Please Select another date",
                "status"=>"0",
            ]);

        }else{


            $vaccine = new Vaccination();
            $vaccine->user_id = $user->id;
            $vaccine->center_id = $centerId;
            $vaccine->date_of_registration = Carbon::parse($date);
            $vaccine->registration_type = "normal";
            $vaccine->name_of_vaccine = $nameOfVaccine;

            $center = Center::where('id', $centerId)->select(['name','address'])->first();
            $userName = $user->name;
            $centerName = $center->name;
            $centerAddress = $center->address;

            if ($vaccine->save())
            {
                ManPowerSchedule::find($registrationCheck->id)->decrement('vaccine_available_set');

                // send sms via helper function
                send_sms('Congratulations '.$userName.'!! You are successfully registered for Vaccination. Your center name is: '.$centerName.','.$centerAddress.', date of vaccination : '.Carbon::parse($date), $phone);

                return response()->json([
                    "message"=>"You are successfully registered for Vaccination",
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

    public function externalVaccination(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $vaccineName = $userArray['vaccineName'];
        $center = $userArray['center'];
        $firstDose = $userArray['firstDose'];
        $secondDose = $userArray['secondDose'];
        $description = $userArray['description'];
        $document = $userArray['document'];
        $centerLocation = $userArray['centerLocation'];


        $user = User::where('phone', $phone)->select(['id'])->first();
        $existVaccination = Vaccination::where('user_id', $user->id)->first();

        if ($existVaccination)
        {
            return response()->json([
                "message"=>"You are already registered for Vaccination. Thank you",
                "status"=>"2",
            ]);
        }

        $vaccine = new Vaccination();

        $vaccine->user_id = $user->id;
        $vaccine->name_of_vaccine = $vaccineName;
        $vaccine->date_of_first_dose = Carbon::parse($firstDose);
        $vaccine->date_of_second_dose = Carbon::parse($secondDose);
        $vaccine->antibody_last_date = Carbon::parse($secondDose)->addDays(30);
        $vaccine->registration_type = "normal";
        $vaccine->status = "1";

        $vaccine->center_name = $center;
        $vaccine->center_location = $centerLocation;
        $vaccine->document = $document;
        $vaccine->description = $description;
        $vaccine->center_type = "external";

        try {
            if ($vaccine->save())
            {
                return response()->json([
                    "message"=>"You are successfully submit your information",
                    "status"=>"1",
                ]);
            }else{
                return response()->json([
                    "message"=>"Something wrong",
                    "status"=>"0",
                ]);
            }

        } catch (\Exception $exception) {
            return response()->json([
                "message"=>'Something went wrong. ' . $exception->getMessage(),
                "status"=>"0",
            ]);
        }



    }

    public function prcRegistration(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $centerId = $userArray['center_id'];
        $date = $userArray['date'];



        $user = User::where('phone', $phone)->select(['id', 'name'])->first();

        $existPcr= PcrTest::where('user_id', $user->id)->first();

        if($existPcr){
            if ($existPcr->date_of_registration != null)
            {
                return response()->json([
                    "message"=>"You are already registered for PCR Test. Thank you",
                    "status"=>"2",
                ]);
            }
       }

        $registrationCheck = ManPowerSchedule::where('center_id', $centerId)->where('date', $date)->select(['pcr_available_set', 'id'])->first();


        if ($registrationCheck==null){
            return response()->json([
                "message"=>"Sorry ! It is not available.Please Select another date",
                "status"=>"0",
            ]);
        }elseif($registrationCheck->pcr_available_set < 1)
        {
            return response()->json([
                "message"=>"Sorry ! It is not available. Please Select another date",
                "status"=>"0",
            ]);

        }else {

            if(!$existPcr)
            {
                $existPcr = new PcrTest();
            }

            $existPcr->user_id = $user->id;
            $existPcr->center_id = $centerId;
            $existPcr->date_of_registration = Carbon::parse($date);
            $existPcr->registration_type = "normal";

            $center = Center::where('id', $centerId)->select(['name','address'])->first();
            $userName = $user->name;
            $centerName = $center->name;
            $centerAddress = $center->address;

            if ($existPcr->save()) {

                ManPowerSchedule::find($registrationCheck->id)->decrement('pcr_available_set');

                // send sms via helper function
                send_sms('Congratulations '.$userName.' !! You are successfully registered for PCR Test. Your center name is: '.$centerName.','.$centerAddress.', date of PCR test : '.Carbon::parse($date), $phone);

                return response()->json([
                    "message" => "You are successfully registered for PCR",
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

        $user = User::where('phone', $phone)->select(['id', 'name'])->first();
        $existBooster= Booster::where('user_id', $user->id)->first();
        if ($existBooster)
        {
            return response()->json([
                "message"=>"You are already registered for Pcr Booster. Thank You",
                "status"=>"2",
            ]);
        }

        $registrationCheck = ManPowerSchedule::where('center_id', $centerId)->where('date', $date)->select(['booster_available_set', 'id'])->first();

        if ($registrationCheck==null){
            return response()->json([
                "message"=>"Sorry ! It is not available.Please Select another date",
                "status"=>"0",
            ]);
        }elseif(!$registrationCheck->booster_available_set > 0)
        {
            return response()->json([
                "message"=>"Sorry ! It is not available. Please Select another date",
                "status"=>"0",
            ]);

        }else {
            $booster = new Booster();
            $booster->user_id = $user->id;
            $booster->center_id = $centerId;
            $booster->date_of_registration = Carbon::parse($date);
            $booster->registration_type = "normal";

            $center = Center::where('id', $centerId)->select(['name','address'])->first();
            $userName = $user->name;
            $centerName = $center->name;
            $centerAddress = $center->address;

            if ($booster->save()) {

                ManPowerSchedule::find($registrationCheck->id)->decrement('booster_available_set');

                // send sms via helper function
                send_sms('Congratulation '.$userName.' !! You are successfully registered for Booster dose. Your center name is: '.$centerName.','.$centerAddress.' , date of Booster : '.Carbon::parse($date), $phone);

                return response()->json([
                    "message" => "You are successfully registered for Booster",
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
