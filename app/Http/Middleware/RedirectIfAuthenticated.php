<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // return redirect(RouteServiceProvider::HOME);
            if(Auth::user()){
                if (Auth::user()->user_type == 'super-admin') {
                   return redirect(RouteServiceProvider::SuperAdminDashboard);
                } elseif (Auth::user()->user_type == 'receptionist') {
                    return redirect(RouteServiceProvider::ReceptionistDashboard);
                } elseif (Auth::user()->user_type == 'pathologist') {
                    return redirect(RouteServiceProvider::PathologistDashboard);
                } elseif (Auth::user()->user_type == 'volunteer') {
                    return redirect(RouteServiceProvider::VolunteerDashboard);
                } elseif (Auth::user()->user_type == 'administrator') {
                  return redirect(RouteServiceProvider::AdministratorDashboard);
                } elseif (Auth::user()->user_type == 'immigration-officer') {
                    return redirect(RouteServiceProvider::ImmigrationOfficerDashboard);
                } else {
                    // return route('login');
                    return route('frontend.index');
                    
                }
            }else{
                // return route('login');
                return route('frontend.index');
            }
        }

        return $next($request);
    }
}
