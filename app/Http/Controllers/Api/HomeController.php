<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booster;
use App\Models\Center;
use App\Models\City;
use App\Models\Country;
use App\Models\CountryAndSynchronizeRule;
use App\Models\PcrTest;
use App\Models\Slider;
use App\Models\State;
use App\Models\Synchronize;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Vaccination;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function slider()
    {
        $sliders = Slider::where('status', '1')->select('image')->get();

        if ($sliders){
            return response()->json([
                "status" => "1",
                "sliders" => $sliders,
            ]);
        }else{
            return response()->json([
                "status" => "0",
                "message" => "Not found",
            ]);
        }
    }

    public function country()
    {
        $countries = Country::select(['id', 'name'])->get();

        if ($countries){
            return response()->json([
                "status" => "1",
                "countries" => $countries,
            ]);
        }else{
            return response()->json([
                "status" => "0",
                "message" => "Not found",
            ]);
        }

    }

    public function state($id)
    {
        $states = State::where('country_id', $id)->select(['id', 'name'])->get();
        if ($states){
            return response()->json([
                "status" => "1",
                "states" => $states,
            ]);
        }else{
            return response()->json([
                "status" => "0",
                "message" => "Not found",
            ]);
        }
    }

    public function city($id)
    {
        $cities = City::where('state_id', $id)->select(['id', 'name'])->get();
        if ($cities){
            return response()->json([
                "status" => "1",
                "cities" => $cities,
            ]);
        }else{
            return response()->json([
                "status" => "0",
                "message" => "Not found",
            ]);
        }
    }

    // public function center($id)
    // {
    //     $centers = Center::where('city_id', $id)->select(['id', 'name'])->get();
    //     if ($centers){
    //         return response()->json([
    //             "status" => "1",
    //             "centers" => $centers,
    //         ]);
    //     }else{
    //         return response()->json([
    //             "status" => "0",
    //             "message" => "Not found",
    //         ]);
    //     }
    // }

    public function VaccineStatusCheck(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $existUser = User::where('phone', $phone)->select(['id'])->first();
        $vaccinationStatus = Vaccination::where('user_id', $existUser->id)->first();
        if ($vaccinationStatus)
        {
            if ($vaccinationStatus->date_of_first_dose != null && $vaccinationStatus->date_of_second_dose != null)
            {
                $boosterStatus = true;
            }else{
                $boosterStatus = false;
            }
        }else{
            $boosterStatus = false;
        }

        if ($vaccinationStatus){

            if ($vaccinationStatus->date_of_second_dose)
            {
                return response()->json([
                    "navigationPath" => "Vaccination Status",
                    "vaccinationIcon" => "uploads/images/setting/vaccine_success_image.png",
                    "boosterStatus"=>$boosterStatus,
                ]);
            }elseif($vaccinationStatus->date_of_first_dose){
                return response()->json([
                    "navigationPath" => "Vaccination Status",
                    "vaccinationIcon" => "uploads/images/setting/half_vaccination_image.png",
                    "boosterStatus"=>$boosterStatus,
                ]);
            }
            else{
                return response()->json([
                    "navigationPath" => "Vaccine Date Status",
                    "vaccinationIcon" => "uploads/images/setting/vaccine_error_image.png",
                    "boosterStatus"=>$boosterStatus,
                ]);
            }
        }else{
            return response()->json([
                "navigationPath" => "Vaccine Registration Button",
                "vaccinationIcon" => "uploads/images/setting/vaccine_error_image.png",
                "boosterStatus"=>$boosterStatus,
            ]);
        }
    }

    public function PrcStatusCheck(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $existUser = User::where('phone', $phone)->select(['id'])->first();

        $pcrStatus = PcrTest::where('user_id', $existUser->id)->where('center_id' ,'!=', null)->orderBy('id', 'desc')->first();
        if ($pcrStatus)
        {
            if($pcrStatus->pcr_result == 'positive') {
                return response()->json([
                    "navigationPath" => "PCR Test Status",
                    "pcrIcon" => "uploads/images/setting/pcr_error_image.png",
                    "pcrEfficacyTimeInSecond" => null,
                ]);
            if($pcrStatus->pcr_result == null) {
                return response()->json([
                    "navigationPath" => "PCR Date Status",
                    "pcrIcon" => "uploads/images/setting/pcr_error_image.png",
                    "pcrEfficacyTimeInSecond" => null,
                ]);
            }elseif($pcrStatus->pcr_result == 'negative') {
                return response()->json([
                    "navigationPath" => "PCR Test Status",
                    "pcrIcon" => "uploads/images/setting/pcr_success_image.png",
                    "pcrEfficacyTimeInSecond" => (172800-(Carbon::parse($pcrStatus->result_published_date)->diffInSeconds(Carbon::now()))),
                ]);
            }elseif($pcrStatus->result_published_date == null) {
                return response()->json([
                    "navigationPath" => "PCR Date Status",
                    "pcrIcon" => "uploads/images/setting/pcr_error_image.png",
                    "pcrEfficacyTimeInSecond" => null,
                ]);
            }else{
                return response()->json([
                    "navigationPath" => "PCR",
                    "pcrIcon" => "uploads/images/setting/pcr_error_image.png",
                    "pcrEfficacyTimeInSecond" => null,
                ]);
            }
        }else{
            return response()->json([
                "navigationPath" => "PCR",
                "pcrIcon" => "uploads/images/setting/pcr_error_image.png",
                "pcrEfficacyTimeInSecond" => null,
            ]);
        }
    }

    public function BoosterStatusCheck(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $existUser = User::where('phone', $phone)->select(['id'])->first();

        $boosterStatus = Booster::where('user_id', $existUser->id)->first();

        if ($boosterStatus){
            if ($boosterStatus->date)
            {
                return response()->json([
                    "navigationPath" => "Booster Status",
                    "boosterIcon" => "uploads/images/setting/booster_success_image.png",
                ]);
            }else{
                return response()->json([
                    "navigationPath" => "Booster Date Status",
                    "boosterIcon" => "uploads/images/setting/booster_error_image.png",
                ]);
            }
        }else{
            return response()->json([
                "navigationPath" => "Booster",
                "boosterIcon" => "uploads/images/setting/booster_error_image.png",
            ]);
        }
    }

    public function vaccinationLeftTime(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $existUser = User::where('phone', $phone)->select(['id'])->first();
        $vaccinationStatus = Vaccination::where('user_id', $existUser->id)->first();
        $centerAddress = Center::where('id', $vaccinationStatus->center_id)->select(['address'])->first();


        $start = Carbon::parse(Carbon::now());
        $end = Carbon::parse($vaccinationStatus->date_of_registration);

        if ($start > $end)
        {
            $leftDay = "00";
            $leftHour ="00";
            //$leftHour =;
        }else{
            $interval = $start->diff($end, false);
            $leftDay = $interval->format('%a');//now do whatever you like with $days
            $leftHour = $interval->format('%h');//now do whatever you like with $days
        }


        if ($vaccinationStatus){
            return response()->json([
                "status" => "1",
                "leftHour" => $leftHour,
                "leftDay" => $leftDay,
                "centerAddress" => $centerAddress->address,
            ]);
        }else{
            return response()->json([
                "status" => "0",
                "message" => "Not found",
            ]);
        }
    }

    public function pcrLeftTime(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $existUser = User::where('phone', $phone)->select(['id'])->first();
        $pcrStatus = PcrTest::where('user_id', $existUser->id)->first();
        $centerAddress = Center::where('id', $pcrStatus->center_id)->select(['address'])->first();


        $start = Carbon::parse(Carbon::now());
        $end = Carbon::parse($pcrStatus->date_of_registration);


        if ($start > $end)
        {
            $leftDay = "00";
            $leftHour ="00";
            //$leftHour =;
        }else{
            $interval = $start->diff($end, false);
            $leftDay = $interval->format('%a');//now do whatever you like with $days
            $leftHour = $interval->format('%h');//now do whatever you like with $days
        }


        if ($pcrStatus){
            return response()->json([
                "status" => "1",
                "leftHour" => $leftHour,
                "leftDay" => $leftDay,
                "centerAddress" => $centerAddress->address,
            ]);
        }else{
            return response()->json([
                "status" => "0",
                "message" => "Not found",
            ]);
        }
    }

    public function boosterLeftTime(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $existUser = User::where('phone', $phone)->select(['id'])->first();
        $boosterStatus = Booster::where('user_id', $existUser->id)->first();
        $centerAddress = Center::where('id', $boosterStatus->center_id)->select(['address'])->first();


        $start = Carbon::parse(Carbon::now());
        $end = Carbon::parse($boosterStatus->date_of_registration);


        if ($start > $end)
        {
            $leftDay = "00";
            $leftHour ="00";
            //$leftHour =;
        }else{
            $interval = $start->diff($end, false);
            $leftDay = $interval->format('%a');//now do whatever you like with $days
            $leftHour = $interval->format('%h');//now do whatever you like with $days
        }

        if ($boosterStatus){
            return response()->json([
                "status" => "1",
                "leftHour" => $leftHour,
                "leftDay" => $leftDay,
                "centerAddress" => $centerAddress->address,
            ]);
        }else{
            return response()->json([
                "status" => "0",
                "message" => "Not found",
            ]);
        }
    }

    public function userProfile(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $existUser = User::where('phone', $phone)->select(['id'])->first();
        $boosterStatus = Booster::where('user_id', $existUser->id)->first();
        $centerAddress = Center::where('id', $boosterStatus->center_id)->select(['address'])->first();

        if ($boosterStatus){
            return response()->json([
                "status" => "1",
                "leftHour" => "5",
                "leftDay" => "10",
                "centerAddress" => $centerAddress->address,
            ]);
        }else{
            return response()->json([
                "status" => "0",
                "message" => "Not found",
            ]);
        }
    }

    public function editProfile(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $existUser = User::where('phone', $phone)->first();
        $userInfo = UserInfo::where('user_id', $existUser->id)->select(['passport_no','present_address'])->first();

        if ($existUser){
            return response()->json([
                "status" => "1",
                "user" => $existUser,
                "address" => $userInfo->present_address,
                "passport" => $userInfo->passport_no,
            ]);
        }else{
            return response()->json([
                "status" => "0",
                "message" => "Not found",
            ]);
        }
    }

    public function updateProfile(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $exitUser = User::where('phone',$phone)->first();

        $exitUser->name = $userArray['name'];
        $exitUser->phone = $userArray['phone'];
        if ($userArray['password']){
            $exitUser->password = Hash::make($userArray['password']);
        }else{
            $exitUser->password = $exitUser->password;
        }
        $exitUser->save();

        $existUserInfo = $exitUser->userInfo;
        $existUserInfo->present_address = $userArray['address'];
        $existUserInfo->passport_no = $userArray['passport'];

        try {
            $existUserInfo->save();
            return response()->json([
                "message"=>"Successfully Updated",
                "status"=>"1",
            ]);
        }catch (\Exception $exception){
            return response()->json([
                "message"=>$exception->getMessage(),
                "status"=>"0",
            ]);
        }



    }

    public function profileInformation(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $exitUser = User::where('phone',$phone)->first();

        if ($exitUser->image == null)
        {
            $userImage = "uploads/images/setting/user.png";
        }else{
            $userImage = $exitUser->image;
        }

        $vaccinationCenterInfoName = '';
        $vaccinationCenterInfoAddress = '';
        $vaccinationStatusDate_of_first_dose = '';
        $vaccinationStatusDate_of_second_dose = '';
        $vaccinationStatusName_of_vaccine = '';
        $antibody_last_date = '';

        $vaccinationCenterType = Vaccination::where('user_id', $exitUser->id)->first();

        if (!empty($vaccinationCenterType))
        {
            if ($vaccinationCenterType->center_type === 'external'){
                $vaccinationStatusDate_of_first_dose=Carbon::parse($vaccinationCenterType->date_of_first_dose)->format("j S F Y");
                $vaccinationStatusDate_of_second_dose=Carbon::parse($vaccinationCenterType->date_of_second_dose)->format("j S F Y");
                $vaccinationStatusName_of_vaccine=$vaccinationCenterType->name_of_vaccine;
                $vaccinationCenterInfoName=$vaccinationCenterType->center_name;
                $vaccinationCenterInfoAddress=$vaccinationCenterType->center_location;
                $antibody_last_date=Carbon::parse($vaccinationCenterType->antibody_last_date)->format("j S F Y");
            }else{
                $vaccinationStatus = Vaccination::where('user_id', $exitUser->id)->select(['center_id', 'date_of_first_dose', 'date_of_second_dose', 'name_of_vaccine', 'antibody_last_date'])->first();
                if($vaccinationStatus)
                {
                    $vaccinationCenterInfo = Center::where('id', $vaccinationStatus->center_id)->select(['name', 'address'])->first();
                    $vaccinationCenterInfoName = $vaccinationCenterInfo->name;
                    $vaccinationCenterInfoAddress = $vaccinationCenterInfo->address;

                    // if condition removed then showing default date as today
                    if($vaccinationStatus->date_of_first_dose != null){
                        $vaccinationStatusDate_of_first_dose = Carbon::parse($vaccinationStatus->date_of_first_dose)->format("j S F Y");
                    }
                    if($vaccinationStatus->date_of_second_dose != null){
                        $vaccinationStatusDate_of_second_dose = Carbon::parse($vaccinationStatus->date_of_second_dose)->format("j S F Y");
                        $antibody_last_date = Carbon::parse($vaccinationStatus->antibody_last_date)->format("j S F Y");
                    }
                    $vaccinationStatusName_of_vaccine = $vaccinationStatus->name_of_vaccine;
                }
            }
        }


        $pcrStatus = PcrTest::where('user_id', $exitUser->id)->select(['center_id', 'pcr_result', 'date_of_pcr_test'])->first();
        $pcrCenterInfoMame = '';
        $pcrCenterInfoAddress = '';
        $pcrStatusDate_of_pcr_test = '';
        if($pcrStatus)
        {
            $pcrCenterInfo = Center::where('id', $pcrStatus->center_id)->select(['name', 'address'])->first();
            $pcrCenterInfoMame = $pcrCenterInfo->name;
            $pcrCenterInfoAddress = $pcrCenterInfo->address;
            $pcrStatusDate_of_pcr_test = Carbon::parse($pcrStatus->date_of_pcr_test)->format("j S F Y");
        }


        $boosterStatus = Booster::where('user_id', $exitUser->id)->select(['center_id','date', 'antibody_last_date'])->first();
        $boosterCenterInfoName = '';
        $boosterCenterInfoAddress = '';
        $boosterStatusDate = '';
        $boosterStatusAntibody_last_date = '';
        if($boosterStatus)
        {
            $boosterCenterInfo = Center::where('id', $boosterStatus->center_id)->select(['name', 'address'])->first();
            $boosterCenterInfoName = $boosterCenterInfo->name;
            $boosterCenterInfoAddress = $boosterCenterInfo->address;
            $boosterStatusDate = Carbon::parse($boosterStatus->date)->format("j S F Y");
            $boosterStatusAntibody_last_date = Carbon::parse($boosterStatus->antibody_last_date)->format("j S F Y");
        }





        return response()->json([
            "status"=>"1",
            "userId"=>$exitUser->id,
            "userImage"=>$userImage,

            "myPcrLastTest"=>$pcrStatusDate_of_pcr_test,
            "myLastPcrResult"=>$pcrStatusDate_of_pcr_test,
            "myPcrTestCenter"=>$pcrCenterInfoMame,
            "myPcrCenterLocation"=>$pcrCenterInfoAddress,

            "myVaccinationDoseOne"=>$vaccinationStatusDate_of_first_dose,
            "myVaccinationDoseTwo"=>$vaccinationStatusDate_of_second_dose,
            "myVaccinationName"=>$vaccinationStatusName_of_vaccine,
            "myVaccinationCenter"=>$vaccinationCenterInfoName,
            "myVaccinationCenterLocation"=>$vaccinationCenterInfoAddress,
            "myAntibodyRemaining"=>$antibody_last_date,

            "myBoosterCenter"=>$boosterCenterInfoName,
            "myBoosterCenterLocation"=>$boosterCenterInfoAddress,
            "myBoosterDate"=>$boosterStatusDate,
            "mybBoosterAntibodyRemaining"=>$boosterStatusAntibody_last_date,
        ]);
    }

    public function vaccinationInformation(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $exitUser = User::where('phone',$phone)->first();
        $vaccinationStatus = Vaccination::where('user_id', $exitUser->id)->select(['center_name','center_location','center_id', 'date_of_first_dose', 'date_of_second_dose', 'name_of_vaccine', 'first_served_by_id', 'second_served_by_id'])->first();
        $vaccinationCenterInfoName = '';
        $vaccinationCenterInfoAddress = '';
        $vaccinationStatusDate_of_first_dose = '';
        $vaccinationStatusDate_of_second_dose = '';
        $vaccinationStatusName_of_vaccine = '';
        $serveByFirstId = '';
        $serveByFirstName = '';
        $serveBySecondId = '';
        $serveBySecondName = '';
        $myVaccinationImage = '';
        if($vaccinationStatus)
        {
            $vaccinationCenterInfo = Center::where('id', $vaccinationStatus->center_id)->select(['name', 'address'])->first();
            if($vaccinationCenterInfo){
                $vaccinationCenterInfoName = $vaccinationCenterInfo->name;
                $vaccinationCenterInfoAddress = $vaccinationCenterInfo->address;
            }else{
                $vaccinationCenterInfoName = $vaccinationStatus->center_name;
                $vaccinationCenterInfoAddress = $vaccinationStatus->center_location;
            }

            $serveByFirst = User::where('id', $vaccinationStatus->first_served_by_id)->select(['name', 'id'])->first();
            $serveBySecond = User::where('id', $vaccinationStatus->second_served_by_id)->select(['name', 'id'])->first();

            if($serveByFirst) {
                $serveByFirstId = $serveByFirst->id;
                $serveByFirstName = $serveByFirst->name;
            }else{
                $serveByFirstId = "";
                $serveByFirstName = "";
            }

            $vaccinationStatusDate_of_first_dose = Carbon::parse($vaccinationStatus->date_of_first_dose)->format("j S F Y");
            $vaccinationStatusName_of_vaccine = $vaccinationStatus->name_of_vaccine;
            $myVaccinationImage = 'uploads/images/setting/half_vaccination_image.png';

            if($serveBySecond) {
                $serveBySecondId = $serveBySecond->id;
                $serveBySecondName = $serveBySecond->name;
            }else{
                $serveBySecondId = "";
                $serveBySecondName = "";
            }

            if($vaccinationStatus->date_of_second_dose){
                $vaccinationStatusDate_of_second_dose = Carbon::parse($vaccinationStatus->date_of_second_dose)->format("j S F Y");
                $myVaccinationImage = 'uploads/images/setting/vaccine_success_image.png';
            }
        }

        return response()->json([
            "myServeByFirstId"=>$serveByFirstId,
            "myServeByFirstName"=>$serveByFirstName,
            "myServeBySecondId"=>$serveBySecondId,
            "myServeBySecondName"=>$serveBySecondName,
            "myVaccinationDoseOne"=>$vaccinationStatusDate_of_first_dose,
            "myVaccinationDoseTwo"=>$vaccinationStatusDate_of_second_dose,
            "myVaccinationName"=>$vaccinationStatusName_of_vaccine,
            "myVaccinationCenter"=>$vaccinationCenterInfoName,
            "myVaccinationCenterLocation"=>$vaccinationCenterInfoAddress,
            "myVaccinationImage"=>$myVaccinationImage,
        ]);
    }

    public function pcrInformation(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $exitUser = User::where('phone',$phone)->first();

        $pcrStatus = PcrTest::where('user_id', $exitUser->id)->select(['center_id', 'pcr_result', 'date_of_pcr_test', 'tested_by', 'pcr_result'])->first();
        $pcrCenterInfoMame = '';
        $pcrCenterInfoAddress = '';
        $pcrStatusDate_of_pcr_test = '';
        $serveById = '';
        $serveByName = '';
        $pcrResult = '';
        if($pcrStatus)
        {
            $pcrCenterInfo = Center::where('id', $pcrStatus->center_id)->select(['name', 'address'])->first();
            $serveBy = User::where('id', $pcrStatus->tested_by)->select(['name', 'id'])->first();
            $pcrCenterInfoMame = $pcrCenterInfo->name;
            $pcrCenterInfoAddress = $pcrCenterInfo->address;
            $pcrStatusDate_of_pcr_test = Carbon::parse($pcrStatus->date_of_pcr_test)->format("j S F Y");
            $serveById = $serveBy->id;
            $serveByName = $serveBy->name;
            $pcrResult = $pcrStatus->pcr_result;
        }

        return response()->json([
            "myServeById"=>$serveById,
            "myServeByName"=>$serveByName,
            "myPcrLastTest"=>$pcrStatusDate_of_pcr_test,
            "myLastPcrResult"=>$pcrResult,
            "myPcrTestCenter"=>$pcrCenterInfoMame,
            "myPcrCenterLocation"=>$pcrCenterInfoAddress,
        ]);
    }

    public function boosterInformation(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $exitUser = User::where('phone',$phone)->first();

        $boosterStatus = Booster::where('user_id', $exitUser->id)->select(['center_id','date', 'antibody_last_date', 'served_by_id', 'name_of_vaccine'])->first();
        $boosterCenterInfoName = '';
        $boosterCenterInfoAddress = '';
        $boosterStatusDate = '';
        $boosterStatusAntibody_last_date = '';
        $serveById = '';
        $serveByName = '';
        $nameOfVaccine = '';
        if($boosterStatus)
        {
            $boosterCenterInfo = Center::where('id', $boosterStatus->center_id)->select(['name', 'address'])->first();
            $serveBy = User::where('id', $boosterStatus->served_by_id)->select(['name', 'id'])->first();
            $boosterCenterInfoName = $boosterCenterInfo->name;
            $boosterCenterInfoAddress = $boosterCenterInfo->address;
            $boosterStatusDate = Carbon::parse($boosterStatus->date)->format("j S F Y");
            $boosterStatusAntibody_last_date = Carbon::parse($boosterStatus->antibody_last_date)->format("j S F Y");
            $serveById = $serveBy->id;
            $serveByName = $serveBy->name;
            $nameOfVaccine = $boosterStatus->name_of_vaccine;
        }


        return response()->json([
            "myServeById"=>$serveById,
            "myServeByName"=>$serveByName,
            "myNameOfVaccine"=>$nameOfVaccine,
            "myBoosterCenter"=>$boosterCenterInfoName,
            "myBoosterCenterLocation"=>$boosterCenterInfoAddress,
            "myBoosterDate"=>$boosterStatusDate,
            "myAntibodyRemaining"=>$boosterStatusAntibody_last_date,
        ]);
    }

    public function synchronizeInformation($country_id, $phone_number)
    {
        try {
            $user = User::where('phone',$phone_number)->first();

            $rules = CountryAndSynchronizeRule::where('country_id', $country_id)->with('rule')->get();
            $countryName = Country::where('id', $country_id)->select(['name'])->first();

            if (!empty($rules)){
                return response()->json([
                    "status"=>'1',
                    "country_name"=>$countryName->name,
                    "user_synchronizes"=>get_user_synchronize_array_by_user_id($user->id),
                    "rules"=>$rules,
                ]);
            }else{
                return response()->json([
                    "status"=>'0',
                ]);
            }
        } catch (\Exception $exception) {
            return response()->json([
                "status"=>'0',
                "message"=>'Something went wrong'.$exception->getMessage(),
            ]);
        }
    }
}
