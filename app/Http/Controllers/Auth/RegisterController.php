<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;

    public function redirectTo()
    {
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
            // return route('login');
            return route('frontend.index');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
