<?php

namespace App\Http\Controllers\RapidPCRCenterPathologist;

use App\Http\Controllers\Controller;
use App\Models\PcrTest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PcrResultController extends Controller
{
    public function waiting(){
        $pcrTests = PcrTest::where('rapid_pcr_center_id', Auth::user()->rapid_pcr_center_id)->where('rapid_pcr_result', null)->orderBy('created_at', 'DESC')->get();
        return view('RapidPCRCenterPathologist.pcrResult.waiting', compact('pcrTests'));
    }

    public function published(){
        $pcrTests = PcrTest::where('rapid_pcr_center_id', Auth::user()->rapid_pcr_center_id)->where('rapid_pcr_result', '!=', null)->orderBy('updated_at', 'DESC')->get();
        return view('RapidPCRCenterPathologist.pcrResult.published', compact('pcrTests'));
    }

    public function getPcrDetails($id){

        $pcrTest = PcrTest::findOrFail($id);

        $data['pcrTest'] = $pcrTest;
        $data['user'] = $pcrTest->user;
        $data['userInfo'] = $pcrTest->user->userInfo;

        return response()->json([
            'type' => 'success',
            'data' => $data,
        ]);

    }

    public function update(Request $request, $id){
        if($request->testResult == 'positive' || $request->testResult == 'negative'){
            $pcrTest = PcrTest::find($id);
            $pcrTest->rapid_pcr_result = $request->testResult;
            $pcrTest->tested_by = Auth::user()->id;
            $pcrTest->result_published_date = Carbon::now();
            $pcrTest->status = 1;

            try {
                $pcrTest->save();
                return response()->json([
                    'type' => 'success',
                    'message' => 'Result uploaded successfully !',
                ]);
            } catch (\Exception $exception) {
                return response()->json([
                    'type' => 'error',
                    'message' => 'Something going wrong. ' . $exception->getMessage(),
                ]);
            }
        }else{
            return response()->json([
                'type' => 'error',
                'message' => 'Have to select Positive or Negative !',
            ]);
        }


    }

}
