<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){

        return redirect()->route('volunteer.registered.index');
        // return view('Volunteer.registered.index');
        // return view('Volunteer.dashboard');
    }
}
