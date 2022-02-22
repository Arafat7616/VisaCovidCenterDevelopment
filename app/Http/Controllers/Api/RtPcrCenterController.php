<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PcrTest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\UserAndSynchronizeRule;

class RtPcrCenterController extends Controller
{
    public function rtPcrRegisteredList(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $user = User::where('phone', $phone)->select(['rapid_pcr_center_id', 'id'])->first();
        $pcrRegisteredLists = PcrTest::where('rapid_pcr_center_id', $user->rapid_pcr_center_id)->where('date_of_pcr_test', null)->select(['user_id', 'id','synchronize_id'])->get();

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
                $myData[$key]['synchronize_id'] = (string)$pcrRegisteredList->synchronize_id;
            }

            return response()->json([
                "myData" => $myData,
                "status" => '1',
            ]);
        }
    }

    public function rtPcrFrom(Request $request)
    {
        try {
            $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $applicationId = $userArray['applicationId'];
        $synchronize_id = $userArray['synchronizeId'];

        $user = User::where('phone', $phone)->select('id')->first();
        $pcr = PcrTest::where('id', $applicationId)->first();

        $pcr->sample_collection_date = Carbon::now();
        $pcr->date_of_pcr_test = Carbon::now();
        $pcr->tested_by = $user->id;

        // // Synchronize record store
        // UserAndSynchronizeRule::where('user_id', $pcr->user_id)->where('synchronize_id', $synchronize_id)->delete();
        // $userAndSynchronizeRule = new UserAndSynchronizeRule();
        // $userAndSynchronizeRule->user_id = $pcr->user_id;
        // $userAndSynchronizeRule->synchronize_id = $synchronize_id;
        // $userAndSynchronizeRule->save();

        try {
            $pcr->save();
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
    } catch (\Exception $exception) {
            return response()->json([
                "message"=>"Something went wrong .".$exception->getMessage(),
                "status"=>'0',
            ]);
        }
    }
}
