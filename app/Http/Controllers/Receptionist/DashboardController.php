<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        // return view('Receptionist.dashboard');
        // return view('Receptionist.new-registration.index');

        return redirect()->route('receptionist.newRegistration.index');

    }
}
