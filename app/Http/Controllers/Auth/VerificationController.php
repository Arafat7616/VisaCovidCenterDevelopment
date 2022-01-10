<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
            } elseif (Auth::user()->user_type == 'rapid-pcr-center-administrator') {
                return 'rapid-pcr-center-administrator/dashboard';
            } elseif (Auth::user()->user_type == 'rapid-pcr-center-pathologist') {
                return 'rapid-pcr-center-pathologist/dashboard';
            } elseif (Auth::user()->user_type == 'rapid-pcr-center-receptionist') {
                return 'rapid-pcr-center-receptionist/dashboard';
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
