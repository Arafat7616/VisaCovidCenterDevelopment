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
use App\Models\Vaccination;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
            return response()->json([
                "status" => "1",
                "navigationPath" => "Vaccine Date Status",
                "date" => $vaccinationStatus->date_of_registration,
                "centerId" => $vaccinationStatus->center_id,
            ]);
        }else{
            return response()->json([
                "status" => "0",
                "navigationPath" => "Vaccine Registration",
            ]);
        }
    }

    public function PrcStatusCheck(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $existUser = User::where('phone', $phone)->select(['id'])->first();

        $pcrStatus = PcrTest::where('user_id', $existUser->id)->first();
        if ($pcrStatus){
            return response()->json([
                "status" => "1",
                "navigationPath" => "PCR Date Status",
                "date" => $pcrStatus->date_of_registration,
                "centerId" => $pcrStatus->center_id,
            ]);
        }else{
            return response()->json([
                "status" => "0",
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
            return response()->json([
                "status" => "1",
                "navigationPath" => "Booster Date Status",
                "date" => $boosterStatus->date_of_registration,
                "centerId" => $boosterStatus->center_id,
            ]);
        }else{
            return response()->json([
                "status" => "0",
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
}
