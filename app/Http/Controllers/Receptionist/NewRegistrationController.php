<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewRegistrationController extends Controller
{
    public function index(){
        $users = User::where('center_id', Auth::user()->center_id)->where('user_type', 'user')->get();
        return view('Receptionist.new-registration.index', compact('users'));
    }
}
