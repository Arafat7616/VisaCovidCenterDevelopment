<?php

namespace App\Http\Controllers\Pathologist;

use App\Http\Controllers\Controller;
use App\Models\PcrTest;
use App\Models\UserAndSynchronizeRule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PcrResultController extends Controller
{
    public function waiting(){
        $pcrTests = PcrTest::where('center_id', Auth::user()->center_id)->where('pcr_result', null)->orderBy('created_at', 'DESC')->get();
        return view('Pathologist.pcrResult.waiting', compact('pcrTests'));
    }

    public function published(){
        $pcrTests = PcrTest::where('center_id', Auth::user()->center_id)->where('pcr_result', '!=', null)->orderBy('updated_at', 'DESC')->get();
        return view('Pathologist.pcrResult.published', compact('pcrTests'));
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
            $pcrTest->tested_by = Auth::user()->id;
            $pcrTest->result_published_date = Carbon::now();
            $pcrTest->status = 1;

            if ($request->testResult == 'negative') {
                // Synchronize record store
                UserAndSynchronizeRule::where('user_id', $pcrTest->user_id)->where('synchronize_id', $pcrTest->synchronize_id)->delete();
                $userAndSynchronizeRule = new UserAndSynchronizeRule();
                $userAndSynchronizeRule->user_id = $pcrTest->user_id;
                $userAndSynchronizeRule->synchronize_id = $pcrTest->synchronize_id;
                $userAndSynchronizeRule->save();
            }

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
