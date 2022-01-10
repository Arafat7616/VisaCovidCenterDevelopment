<?php

namespace App\Http\Controllers\RapidPCRCenterTrustedMedicalAssistant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){

        return redirect()->route('rapidPcrCenterTrustedMedicalAssistant.user.pcr');
        // return view('RapidPCRCenterTrustedMedicalAssistant.dashboard');
    }

    public function profile(){
        $user = Auth::user();
        return view('RapidPCRCenterTrustedMedicalAssistant.profile.index', compact('user'));
    }
}
