<?php

namespace App\Http\Controllers\RapidPCRCenterReceptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        // return view('RapidPCRCenterReceptionist.dashboard');
        // return view('RapidPCRCenterReceptionist.new-registration.index');

        return redirect()->route('rapidPcrCenterReceptionist.newRegistration.index');

    }

    public function profile(){
        $user = Auth::user();
        return view('RapidPCRCenterReceptionist.profile.index', compact('user'));
    }


}
