<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\CenterSynchronizeRule;
use App\Models\Synchronize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CenterSynchronizeRuleController extends Controller
{
    public function rules(){
        $center = Center::findOrFail(Auth::user()->center_id);
        $synchronizes = Synchronize::where('status', true)->orderBy('id', 'DESC')->get();
        return view('Administrator.synchronizeRules.index', compact('center','synchronizes'));
    }

    public function rulesUpdate(Request $request){
        CenterSynchronizeRule::where('center_id', Auth::user()->center_id)->delete();
        foreach ($request->synchronizes as $synchronize_id) {
            $centerSynchronizeRule = new CenterSynchronizeRule();
            $centerSynchronizeRule->center_id = Auth::user()->center_id;
            $centerSynchronizeRule->city_id = Auth::user()->center->city_id;
            $centerSynchronizeRule->synchronize_id = $synchronize_id;
            $centerSynchronizeRule->save();
        }

        return back()->with('success', 'Rule updated successfully.');
    }
}
