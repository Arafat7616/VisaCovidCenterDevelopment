<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('Volunteer.registered.pcr');
        // return view('Volunteer.dashboard');
    }
}
