<?php

namespace App\Http\Controllers\ImmigrationOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
   
        // return redirect()->route('immigrationOfficer.user.pcr');
        return view('ImmigrationOfficer.dashboard');
    }

    public function profile(){
        $user = Auth::user();

        echo "<pre>";
        print_r($user);
        echo "</pre>";
        // return view('ImmigrationOfficer.profile.index', compact('user'));
    }
}
