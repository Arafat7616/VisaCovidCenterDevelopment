<?php

namespace App\Http\Controllers\Pathologist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        return redirect()->route('pathologist.pcrResult.waiting');
        // return view('Pathologist.dashboard');
    }
}
