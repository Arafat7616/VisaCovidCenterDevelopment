<?php

namespace App\Http\Controllers\RapidPCRCenterTrustedMedicalAssistant;

use App\Http\Controllers\Controller;
use App\Models\PcrTest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Vaccination;
use App\Models\Booster;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function pcr(){
        $pcrTests = PcrTest::where('registration_type', 'normal')->where('rapid_pcr_center_id', Auth::user()->rapid_pcr_center_id)->where('rapid_pcr_result', null)->orderBy('created_at', 'DESC')->get();
        $pcrTestsOrderByDate = $pcrTests->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('d/m/Y');
        });
        return view('RapidPCRCenterTrustedMedicalAssistant.user.pcr', compact('pcrTestsOrderByDate'));
    }

    public function vaccine(){
        $vaccinations = Vaccination::where('registration_type', 'normal')->where('rapid_pcr_center_id', Auth::user()->rapid_pcr_center_id)->where('date_of_second_dose','=', null)->orderBy('updated_at', 'DESC')->get();
        $vaccinationsOrderByDate = $vaccinations->groupBy(function ($val) {
            return Carbon::parse($val->updated_at)->format('d/m/Y');
        });
        return view('RapidPCRCenterTrustedMedicalAssistant.user.vaccine', compact('vaccinationsOrderByDate'));
    }

    public function booster(){
        $boosters = Booster::where('registration_type', 'normal')->where('rapid_pcr_center_id', Auth::user()->rapid_pcr_center_id)->where('date', null)->orderBy('created_at', 'DESC')->get();
        $boostersOrderByDate = $boosters->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('d/m/Y');
        });
        return view('RapidPCRCenterTrustedMedicalAssistant.user.booster', compact('boostersOrderByDate'));
    }
}
