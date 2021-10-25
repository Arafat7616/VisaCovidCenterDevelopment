<?php

namespace App\Http\Controllers\Pathologist;

use App\Http\Controllers\Controller;
use App\Models\PcrTest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PcrResultController extends Controller
{
    public function waiting(){
        $pcrTests = PcrTest::where('center_id', Auth::user()->center_id)->where('pcr_result', null)->orderBy('created_at', 'DESC')->get();
        return view('Pathologist.pcrResult.waiting', compact('pcrTests'));
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
        // $request->validate([
        //     'testResult' => 'required|string',
        // ]);
        if($request->testResult == 'positive' || $request->testResult == 'negative'){
            $pcrTest = PcrTest::find($id);
            $pcrTest->pcr_result = $request->testResult;
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
                    'type' => 'warning',
                    'message' => 'Something going wrong. ' . $exception->getMessage(),
                ]);
            }
        }else{
            return response()->json([
                'type' => 'warning',
                'message' => 'Have to select Positive or Negative !',
            ]);
        }


    }

}
