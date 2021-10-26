<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        return redirect()->route('administrator.volunteer.index');
        // return view('Administrator.dashboard');
    }

    public function profile(){
        $user = Auth::user();
        return view('Administrator.profile.index', compact('user'));
    }

}
