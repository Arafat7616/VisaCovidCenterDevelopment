<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        $trustedPeoples = User::whereIn('user_type', ['volunteer', 'receptionist', 'pathologist'])->orderBy('user_type', 'DESC')->get();
        return view('Administrator.dashboard', compact('trustedPeoples'));
    }

    public function profile(){
        $user = Auth::user();
        return view('Administrator.profile.index', compact('user'));
    }

}
