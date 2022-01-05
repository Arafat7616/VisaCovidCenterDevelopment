<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QrController extends Controller
{
    public function qrScan()
    {
        return view('Receptionist.new-registration.qrScan');
    }
}
