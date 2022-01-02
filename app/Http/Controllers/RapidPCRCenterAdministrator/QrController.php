<?php

namespace App\Http\Controllers\RapidPCRCenterAdministrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QrController extends Controller
{
    public function qrScan()
    {
        return view('RapidPCRCenterAdministrator.trustedMedicalAssistant.qrScan');
    }
}
