<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewRegistrationController extends Controller
{
    public  function index()
    {
        return view('Receptionist.new-registration.index');
    }
}
