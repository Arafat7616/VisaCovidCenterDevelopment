<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PcrTest;
use App\Models\User;
use Carbon\Carbon;

class RegisteredController extends Controller
{
   public function index()
   {
       return view('Volunteer.registered.index');
   }
}
