<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo;
    public function redirectTo()
    {
        if(Auth::user()){
            if (Auth::user()->user_type == 'super-admin') {
                return 'super-admin/dashboard';
            } elseif (Auth::user()->user_type == 'receptionist') {
                return 'receptionist/dashboard';
            } elseif (Auth::user()->user_type == 'pathologist') {
                return 'pathologist/dashboard';
            } elseif (Auth::user()->user_type == 'trusted-medical-assistant') {
                return 'trusted-medical-assistant/dashboard';
            } elseif (Auth::user()->user_type == 'administrator') {
                return 'administrator/dashboard';
            } elseif (Auth::user()->user_type == 'immigration-officer') {
                return 'immigration-officer/dashboard';
            } elseif (Auth::user()->user_type == 'bd-govt') {
                return 'bd-govt/dashboard';
            } else {
                return route('login');
            }
        }else{
            return route('login');
        }
    }
}
