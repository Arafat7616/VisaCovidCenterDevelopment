<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RapidPCRCenterTrustedMedicalAssistant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->user_type == 'rapid-pcr-center-trusted-medical-assistant')) {
            return $next($request);
        }
        else{
            return redirect()->route('login');
        }
    }
}
