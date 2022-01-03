<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QrController extends Controller
{
    public function qrScan()
    {
        return view('Administrator.trustedMedicalAssistant.qrScan');
    }
}
