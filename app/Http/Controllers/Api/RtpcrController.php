<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\PcrTest;
use App\Models\RapidPCRCenter;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RtpcrController extends Controller
{
    public function rtpcrStatus(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $existUser = User::where('phone', $phone)->select(['id'])->first();

        $rtpcrStatus = PcrTest::where('user_id', $existUser->id)->first();

        /*if ($rtpcrStatus)
        {
            if ($rtpcrStatus->rapid_pcr_result != null)
            {
                $rtpcrStatus = '1';
            }else{
                $rtpcrStatus = '0';
            }
        }else{
            $rtpcrStatus = '0';
        }*/

        if ($rtpcrStatus){
            if ($rtpcrStatus->rapid_pcr_result == null)
            {
                return response()->json([
                    "navigationPath" => "Rtpcr Status",
                    "rtpcrIcon" => "uploads/images/setting/rtpcr_danger.png",
                ]);
            }
            else{
                return response()->json([
                    "navigationPath" => "Rtpcr data",
                    "rtpcrIcon" => "uploads/images/setting/rtpcr_success.png",
                ]);
            }
        }else{
            return response()->json([
                "navigationPath" => "Rtpcr Registration Button",
                "rtpcrIcon" => "uploads/images/setting/rtpcr_danger.png",
            ]);
        }
    }

    public function rtpcrCenter($id)
    {

        $centers = RapidPCRCenter::where('city_id', $id)->select(['id', 'name'])->get();
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

    public function rtpcrRegistration(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $centerId = $userArray['center_id'];
        $date = $userArray['date'];

        $user = User::where('phone', $phone)->select(['id', 'name'])->first();

        $existRtPcr= PcrTest::where('user_id', $user->id)->where('rapid_pcr_result', null)->first();
        if ($existRtPcr)
        {
            return response()->json([
                "message"=>"You are already registered for RT-Pcr Test. Thank you",
                "status"=>"2",
            ]);
        }

        $pcr = new PcrTest();
        $pcr->user_id = $user->id;
        $pcr->rapid_pcr_center_id = $centerId;
        $pcr->date_of_registration = Carbon::parse($date);
        $pcr->registration_type = "normal";

        $center = Center::where('id', $centerId)->select(['name','address'])->first();
        $userName = $user->name;
        $centerName = $center->name;
        $centerAddress = $center->address;

        if ($pcr->save()) {
            // send sms via helper function
            send_sms('Congratulations '.$userName.' !! You are successfully registered for RT-PCR Test. Your center name is: '.$centerName.','.$centerAddress.', date of RT-PCR test : '.Carbon::parse($date), $phone);

            return response()->json([
                "message" => "You are successfully registered for RT-PCR",
                "status" => "1",
            ]);
        } else {
            return response()->json([
                "message" => "Something wrong",
                "status" => "0",
            ]);
        }
    }

    public function rtpcrResult(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $exitUser = User::where('phone',$phone)->first();

        $rtpcrStatus = PcrTest::where('user_id', $exitUser->id)->select(['rapid_pcr_center_id', 'rapid_pcr_result', 'updated_at', 'tested_by'])->first();
        $rtpcrCenterInfoMame = '';
        $rtpcrCenterInfoAddress = '';
        $rtpcrStatusDate_of_rtpcr_test = '';
        $serveById = '';
        $serveByName = '';
        $rtpcrResult = '';
        if($rtpcrStatus)
        {
            $rtpcrCenterInfo = RapidPCRCenter::where('id', $rtpcrStatus->rapid_pcr_center_id)->select(['name', 'address'])->first();
            $serveBy = User::where('id', $rtpcrStatus->tested_by)->select(['name', 'id'])->first();
            $rtpcrCenterInfoMame = $rtpcrCenterInfo->name;
            $rtpcrCenterInfoAddress = $rtpcrCenterInfo->address;
            $rtpcrStatusDate_of_rtpcr_test = Carbon::parse($rtpcrStatus->updated_at)->format("j S F Y");
            $serveById = $serveBy->id;
            $serveByName = $serveBy->name;
            $rtpcrResult = $rtpcrStatus->rapid_pcr_result;
        }

        return response()->json([
            "myServeById"=>$serveById,
            "myServeByName"=>$serveByName,
            "myRtPcrLastTest"=>$rtpcrStatusDate_of_rtpcr_test,
            "myLastRtPcrResult"=>$rtpcrResult,
            "myRtPcrTestCenter"=>$rtpcrCenterInfoMame,
            "myRtPcrCenterLocation"=>$rtpcrCenterInfoAddress,
        ]);
    }

    public function rtpcrTimeLeft(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $existUser = User::where('phone', $phone)->select(['id'])->first();
        $pcrStatus = PcrTest::where('user_id', $existUser->id)->first();
        $centerAddress = RapidPCRCenter::where('id', $pcrStatus->rapid_pcr_center_id)->select(['address'])->first();


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
                "message" => "No fixed you",
            ]);
        }


    }
}
