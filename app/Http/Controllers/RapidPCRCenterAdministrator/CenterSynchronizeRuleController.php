<?php

namespace App\Http\Controllers\RapidPCRCenterAdministrator;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\CenterSynchronizeRule;
use App\Models\Synchronize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CenterSynchronizeRuleController extends Controller
{
    public function rules(){
        $center = Center::findOrFail(Auth::user()->rapid_pcr_center_id);
        $synchronizes = Synchronize::where('status', true)->orderBy('id', 'DESC')->get();
        return view('RapidPCRCenterAdministrator.synchronizeRules.index', compact('center','synchronizes'));
    }

    public function rulesUpdate(Request $request){
        CenterSynchronizeRule::where('rapid_pcr_center_id', Auth::user()->rapid_pcr_center_id)->delete();
        foreach ($request->synchronizes as $synchronize_id) {
            $centerSynchronizeRule = new CenterSynchronizeRule();
            $centerSynchronizeRule->rapid_pcr_center_id = Auth::user()->rapid_pcr_center_id;
            $centerSynchronizeRule->city_id = Auth::user()->rapidPcrCenter->city_id;
            $centerSynchronizeRule->synchronize_id = $synchronize_id;
            $centerSynchronizeRule->save();
        }

        return back()->with('success', 'Rule updated successfully.');
    }
}
