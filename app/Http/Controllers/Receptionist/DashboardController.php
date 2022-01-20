<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        // return view('Receptionist.dashboard');
        // return view('Receptionist.new-registration.index');

        return redirect()->route('receptionist.newRegistration.index');

    }

    public function profile(){
        $user = Auth::user();
        return view('Receptionist.profile.index', compact('user'));
    }


}
