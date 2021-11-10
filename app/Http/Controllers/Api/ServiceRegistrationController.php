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

        $vaccine = new Vaccination();
        $vaccine->user_id = $user->id;
        $vaccine->center_id = $request->center_id;
        $vaccine->date_of_registration = Carbon::parse($request->date);
        $vaccine->registration_type = "normal";

        if ($vaccine->save())
        {
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
        $user = User::whrere('phone', $request->phone)->select('id')->first();

        $pcr = new PcrTest();
        $pcr->user_id = $user->id;
        $pcr->center_id = $request->center_id;
        $pcr->sample_collection_date = Carbon::parse($request->date);
        $pcr->registration_type = "normal";

        if ($pcr->save())
        {
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
        $user = User::whrere('phone', $request->phone)->select('id')->first();

        $booster = new Booster();
        $booster->user_id = $user->id;
        $booster->center_id = $request->center_id;
        $booster->date = Carbon::parse($request->date);
        $booster->registration_type = "normal";

        if ($booster->save())
        {
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
