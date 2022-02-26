<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booster;
use App\Models\User;
use App\Models\UserAndSynchronizeRule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BoosterCenterController extends Controller
{
    public function registeredList(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $user = User::where('phone', $phone)->select(['center_id', 'id'])->first();
        $boosterRegisteredLists = Booster::where('center_id', $user->center_id)->where('antibody_last_date', null)->select(['user_id', 'id', 'name_of_vaccine','synchronize_id'])->get();

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
                $myData[$key]['synchronize_id'] = (string)$boosterRegisteredList->synchronize_id;
            }

            return response()->json([
                "myData" => $myData,
                "status" => '1',
            ]);
        }
    }

    public function boosterFrom(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $applicationId = $userArray['applicationId'];
        $synchronize_id = $userArray['synchronizeId'];
        $user = User::where('phone', $phone)->select('id')->first();
        $booster = Booster::where('id', $applicationId)->first();

        $booster->date = Carbon::now();
        $booster->antibody_last_date = Carbon::now()->addMonths(1);
        $booster->served_by_id = $user->id;

            // Synchronize record store
            UserAndSynchronizeRule::where('user_id', $booster->user_id)->where('synchronize_id', $synchronize_id)->delete();
            $userAndSynchronizeRule = new UserAndSynchronizeRule();
            $userAndSynchronizeRule->user_id = $booster->user_id;
            $userAndSynchronizeRule->synchronize_id = $synchronize_id;
            $userAndSynchronizeRule->save();

        try {
            $booster->save();
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
