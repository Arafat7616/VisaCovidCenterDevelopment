<?php

namespace App\Http\Controllers\Pathologist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        return redirect()->route('pathologist.pcrResult.waiting');
        // return view('Pathologist.dashboard');
    }

    public function profile(){
        $user = Auth::user();
        return view('Pathologist.profile.index', compact('user'));
    }
}
