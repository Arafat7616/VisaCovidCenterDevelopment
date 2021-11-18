<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booster;
use App\Models\PcrTest;
use App\Models\User;
use App\Models\Vaccination;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceRegistrationController extends Controller
{
    public function vaccineRegistration(Request $request)
    {
        $user = User::where('phone', $request->phone)->select(['id'])->first();

        $existVaccination = Vaccination::where('user_id', $user->id)->first();
        if ($existVaccination)
        {
            return response()->json([
                "message"=>"You have already registration for Vaccination",
                "status"=>"2",
            ]);
        }

        $vaccine = new Vaccination();
        $vaccine->user_id = $user->id;
        $vaccine->center_id = $request->center_id;
        $vaccine->date_of_registration = Carbon::parse($request->date);
        $vaccine->registration_type = "normal";

        if ($vaccine->save())
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.sms.net.bd/sendsms',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('api_key' => 'l2Phx0d2M8Pd8OLKuuM1K3XZVY3Ln78jUWzoz7xO','msg' => 'Congratulation !! You are successfully registration for Vaccination. ','to' => $request->phone),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

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

    public function prcRegistration(Request $request)
    {
        $user = User::where('phone', $request->phone)->select('id')->first();

        $existPcr= PcrTest::where('user_id', $user->id)->first();
        if ($existPcr)
        {
            return response()->json([
                "message"=>"You have already registration for Pcr Test",
                "status"=>"2",
            ]);
        }

        $pcr = new PcrTest();
        $pcr->user_id = $user->id;
        $pcr->center_id = $request->center_id;
        $pcr->date_of_registration = Carbon::parse($request->date);
        $pcr->registration_type = "normal";

        if ($pcr->save())
        {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.sms.net.bd/sendsms',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('api_key' => 'l2Phx0d2M8Pd8OLKuuM1K3XZVY3Ln78jUWzoz7xO','msg' => 'Congratulation !! You are successfully registration for PCR Test. ','to' => $request->phone),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            return response()->json([
                "message"=>"You have successfully registration for PCR",
                "status"=>"1",
            ]);
        }else{
            return response()->json([
                "message"=>"Something wrong",
                "status"=>"0",
            ]);
        }

    }

    public function boosterRegistration(Request $request)
    {
        $user = User::where('phone', $request->phone)->select('id')->first();

        $existBooster= Booster::where('user_id', $user->id)->first();
        if ($existBooster)
        {
            return response()->json([
                "message"=>"You have already registration for Pcr Booster",
                "status"=>"2",
            ]);
        }

        $booster = new Booster();
        $booster->user_id = $user->id;
        $booster->center_id = $request->center_id;
        $booster->date_of_registration = Carbon::parse($request->date);
        $booster->registration_type = "normal";

        if ($booster->save())
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.sms.net.bd/sendsms',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('api_key' => 'l2Phx0d2M8Pd8OLKuuM1K3XZVY3Ln78jUWzoz7xO','msg' => 'Congratulation !! You are successfully registration for Booster. ','to' => $request->phone),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            return response()->json([
                "message"=>"You have successfully registration for Booster",
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
