<?php

namespace App\Http\Controllers\RapidPCRCenterReceptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QrController extends Controller
{
    public function qrScan()
    {
        return view('RapidPCRCenterReceptionist.new-registration.qrScan');
    }
}
