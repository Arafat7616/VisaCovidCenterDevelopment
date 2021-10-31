<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){

        return redirect()->route('volunteer.user.pcr');
        // return view('Volunteer.dashboard');
    }

    public function profile(){
        $user = Auth::user();
        return view('Volunteer.profile.index', compact('user'));
    }

}
