<?php

namespace App\Http\Controllers\RapidPCRCenterAdministrator;

use App\Http\Controllers\Controller;
use App\Models\Booster;
use App\Models\PcrTest;
use App\Models\Vaccination;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PremiumRegisteredController extends Controller
{
    public function pcr(){
        $pcrTests = PcrTest::where('registration_type', 'premium')->where('rapid_pcr_center_id', Auth::user()->rapid_pcr_center_id)->whereDate('sample_collection_date', '>=', Carbon::today())->orderBy('sample_collection_date', 'ASC')->get();
        return view('RapidPCRCenterAdministrator.premiumRegistered.pcr', compact('pcrTests'));
    }

    public function pcrSwap(Request $request){
        if (!$request->input(['pcrs'])){
            return response()->json(['message'=>'Please select PCR Test.', 'type'=>'warning']);
        }
        if (!$request->input(['date'])){
            return response()->json(['message'=>'Please select date to Swap.', 'type'=>'warning']);
        }
        $is_update_any_one =null;
        foreach($request->input(['pcrs']) as $pcr){
            //Database
            $pcrTest = PcrTest::find($pcr);
            if ($pcrTest){
                $pcrTest->sample_collection_date = $request->date;
                $pcrTest->save();
                $is_update_any_one = 'Yes';
            }else{
                continue;
            }
        }
        if ($is_update_any_one != null)
            return response()->json(['message'=>'Successfully updated !', 'type'=>'success']);
        else
            return response()->json(['message'=>'Please select PCR Test.', 'type'=>'warning']);
    }
}