<?php

namespace App\Http\Controllers\RapidPCRCenterAdministrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

}
