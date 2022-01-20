<?php

namespace App\Http\Controllers\RapidPCRCenterPathologist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        return redirect()->route('rapidPcrCenterPathologist.pcrResult.waiting');
        // return view('RapidPCRCenterPathologist.dashboard');
    }

    public function profile(){
        $user = Auth::user();
        return view('RapidPCRCenterPathologist.profile.index', compact('user'));
    }
}
