<?php

namespace App\Http\Controllers\BdGovt;

use App\Http\Controllers\Controller;
use App\Models\Booster;
use App\Models\Center;
use App\Models\PcrTest;
use App\Models\User;
use App\Models\Vaccination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        $users = User::where('status','1')->get();
        $centers = Center::where('status','1')->get();
        $pcrTests = PcrTest::all();
        $vaccinations = Vaccination::all();
        $boosters = Booster::all();
        return view('BdGovt.dashboard', compact('users','centers','pcrTests','vaccinations','boosters'));
    }

    public function profile(){
        $user = Auth::user();
        return view('BdGovt.profile.index', compact('user'));
    }
}
