<?php

namespace App\Http\Controllers\RapidPCRCenterAdministrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrustedMedicalAssistantController extends Controller
{
    public function index(){
        $trustedPeoples = User::where('rapid_pcr_center_id', Auth::user()->rapid_pcr_center_id)->whereIn('user_type', ['trusted-medical-assistant', 'receptionist', 'pathologist'])->orderBy('user_type', 'DESC')->get();
        return view('RapidPCRCenterAdministrator.trustedMedicalAssistant.index', compact('trustedPeoples'));
    }
}
