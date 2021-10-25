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
        $pcrTests = PcrTest::where('center_id', Auth::user()->center_id)->whereNotIn('pcr_result', ['positive','negative'])->orderBy('created_at', 'DESC')->get();
        $pcrTestsOrderByDate = $pcrTests->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('d/m/Y');
        });
        return view('Volunteer.user.pcr', compact('pcrTestsOrderByDate'));
    }

    public function vaccine(){
        return view('Volunteer.user.vaccine');
    }

    public function booster(){
        return view('Volunteer.user.booster');
    }
}
