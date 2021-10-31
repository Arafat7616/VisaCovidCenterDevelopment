<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\PcrTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredController extends Controller
{
    public function pcr(){
        $pcrTests = PcrTest::where('registration_type', 'normal')->where('center_id', Auth::user()->center_id)->where('pcr_result', null)->orderBy('created_at', 'DESC')->get();
        return view('Administrator.registered.pcr', compact('pcrTests'));
    }
}
