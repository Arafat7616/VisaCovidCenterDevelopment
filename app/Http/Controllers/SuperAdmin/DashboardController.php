<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Booster;
use App\Models\Center;
use App\Models\PcrTest;
use App\Models\User;
use App\Models\Vaccination;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $users = User::where('status','1')->get();
        $centers = Center::where('status','1')->get();
        $pcrTests = PcrTest::all();
        $vaccinations = Vaccination::all();
        $boosters = Booster::all();
        return view('SuperAdmin.dashboard', compact('users','centers','pcrTests','vaccinations','boosters'));
    }
}
