<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\PcrTest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function pcr(){
        $pcrTests = PcrTest::orderBy('id', 'DESC')->get();
        $pcrTestsOrderByDate = $pcrTests->groupBy(function ($val) {
            return Carbon::parse($val->result_published_date)->format('d/m/Y');
        });
        return view('Volunteer.user.pcr', compact('pcrTestsOrderByDate'));


        // return view('Volunteer.user.pcr');
    }

    public function vaccine(){
        return view('Volunteer.user.vaccine');
    }

    public function booster(){
        return view('Volunteer.user.booster');
    }
}
