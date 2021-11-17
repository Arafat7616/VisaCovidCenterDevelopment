<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booster;
use App\Models\Center;
use App\Models\City;
use App\Models\Country;
use App\Models\PcrTest;
use App\Models\Slider;
use App\Models\State;
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

    public function center($id)
    {
        $centers = Center::where('city_id', $id)->select(['id', 'name'])->get();
        if ($centers){
            return response()->json([
                "status" => "1",
                "centers" => $centers,
            ]);
        }else{
            return response()->json([
                "status" => "0",
                "message" => "Not found",
            ]);
        }
    }

    public function VaccineStatusCheck(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $existUser = User::where('phone', $phone)->select(['id'])->first();

        $vaccinationStatus = Vaccination::where('user_id', $existUser->id)->first();

        if ($vaccinationStatus){

            if ($vaccinationStatus->date_of_first_dose)
            {
                return response()->json([
                    "navigationPath" => "Vaccination Status",
                ]);
            }else{
                return response()->json([
                    "navigationPath" => "Vaccine Date Status",
                ]);
            }
        }else{
            return response()->json([
                "navigationPath" => "Vaccine Registration",
            ]);
        }
    }

    public function PrcStatusCheck(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $existUser = User::where('phone', $phone)->select(['id'])->first();

        $pcrStatus = PcrTest::where('user_id', $existUser->id)->orderBy('id', 'desc')->first();


        if ($pcrStatus)
        {
            if($pcrStatus->pcr_result) {
                return response()->json([
                    "navigationPath" => "PCR Test Status",
                ]);
            }else{
                return response()->json([
                    "navigationPath" => "PCR Date Status",
                ]);
            }

        }else{
            return response()->json([
                "navigationPath" => "PCR",
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
                    "navigationPath" => "Booster Date Status",
                ]);
            }else{
                return response()->json([
                    "navigationPath" => "Booster Status",
                ]);
            }
        }else{
            return response()->json([
                "navigationPath" => "Booster",
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
                "leftHour" => "fsdf",
                "leftDay" => "10-10",
                "centerAddress" => "tetet",
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

        $vaccinationStatus = Vaccination::where('user_id', $exitUser->id)->select(['center_id', 'date_of_first_dose', 'date_of_second_dose', 'name_of_vaccine'])->first();
        $vaccinationCenterInfoName = '';
        $vaccinationCenterInfoAddress = '';
        $vaccinationStatusDate_of_first_dose = '';
        $vaccinationStatusDate_of_second_dose = '';
        $vaccinationStatusName_of_vaccine = '';
        if($vaccinationStatus)
        {
            $vaccinationCenterInfo = Center::where('id', $vaccinationStatus->center_id)->select(['name', 'address'])->first();
            $vaccinationCenterInfoName = $vaccinationCenterInfo->name;
            $vaccinationCenterInfoAddress = $vaccinationCenterInfo->address;
            $vaccinationStatusDate_of_first_dose = $vaccinationStatus->date_of_first_dose;
            $vaccinationStatusDate_of_second_dose = $vaccinationStatus->date_of_second_dose;
            $vaccinationStatusName_of_vaccine = $vaccinationStatus->name_of_vaccine;
        }

        $pcrStatus = PcrTest::where('user_id', $exitUser->id)->select(['center_id', 'pcr_result', 'date_of_pcr_test'])->first();
        $pcrCenterInfoMame = '';
        $pcrCenterInfoAddress = '';
        $pcrStatusDate_of_pcr_test = '';
        $pcrStatusDate_of_pcr_test = '';
        if($pcrStatus)
        {
            $pcrCenterInfo = Center::where('id', $pcrStatus->center_id)->select(['name', 'address'])->first();
            $pcrCenterInfoMame = $pcrCenterInfo->name;
            $pcrCenterInfoAddress = $pcrCenterInfo->address;
            $pcrStatusDate_of_pcr_test = $pcrStatus->date_of_pcr_test;
            $pcrStatusDate_of_pcr_test = $pcrStatus->date_of_pcr_test;
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
            $boosterStatusDate = $boosterStatus->date;
            $boosterStatusAntibody_last_date = $boosterStatus->antibody_last_date;
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

            "myBoosterCenter"=>$boosterCenterInfoName,
            "myBoosterCenterLocation"=>$boosterCenterInfoAddress,
            "myBoosterDate"=>$boosterStatusDate,
            "myAntibodyRemaining"=>$boosterStatusAntibody_last_date,
        ]);
    }
}
