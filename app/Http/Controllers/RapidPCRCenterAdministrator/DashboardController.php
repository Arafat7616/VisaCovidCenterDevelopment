<?php

namespace App\Http\Controllers\RapidPCRCenterAdministrator;

use App\Http\Controllers\Controller;
use App\Models\CenterArea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard(){
        return redirect()->route('rapidPcrCenterAdministrator.trustedMedicalAssistant.index');
        // return view('RapidPCRCenterAdministrator.dashboard');
    }

    public function profile(){
        $user = Auth::user();
        return view('RapidPCRCenterAdministrator.profile.index', compact('user'));
    }

    public function centerSpace(){
        $center = Auth::user()->center;
        $centerAreas = CenterArea::where('status', 1)->get();
        return view('RapidPCRCenterAdministrator.profile.center-space', compact('center','centerAreas'));
    }

    public function updateCenterSpace(Request $request){
        $request->validate([
           'space' =>'required'
        ]);

        $center = Auth::user()->center;
        // dd($center);
        $center->center_area_id = $request->space;
        $center->status = 0;
        $center->save();

        Session::flash('success', 'Updated successfully!');

        return back();
    }

}
