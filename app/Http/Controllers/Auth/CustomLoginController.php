<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomLoginController extends Controller
{
    // immigration officer login page
    public function immigrationOfficerLogin(){
        return view('auth.immigrationOfficer.immigration-officer-login');
    }

    public function getMyOTP(Request $request)
    {
        $request->validate([
            'phone'  => 'required',
            'password'  => 'required',
        ]);

        $user = User::where('phone', $request->phone)->first();

        if ($user)
        {
            $hashPassword = $user->password;
            if ($user->deleted_at == null)
            {
                if($user->status == 0){
                    return response()->json([
                        'type' => 'error',
                        'message' => 'Sorry ! This account is not Activated. Please contact with admin . Thank you !'
                    ]);
                }else{
                    if (Hash::check($request->password, $hashPassword))
                    {
                        $user->otp = rand(100000,1000000);
                        $user ->save();
                        return response()->json([
                            'type' => 'success',
                            'message' => 'OTP send in '.$request->phone
                        ]);
                    }else{
                        return response()->json([
                            'type' => 'error',
                            'message' => 'Please Insert valid password'
                        ]);
                    }
                }
            }else{
                return response()->json([
                    'type' => 'error',
                    'message' => 'This account has been suspended! .Please contact with admin .'
                ]);
            }
        }else{
            return response()->json([
                'type' => 'error',
                'message' => 'Please Insert valid phone no.'
            ]);
        }

    }

    public function checkOtp(Request $request)
    {
        $request->validate([
            'otp'  => 'required',
            'phone'  => 'required',
        ]);

        $verification = User::where('phone', $request->phone)->where('otp', $request->otp)->first();

        if ($verification){
            $verification->otp_verified_at = Carbon::now();
            $verification->save();

            return response()->json([
                'type' => 'success',
                'message' => 'OTP Successfully verified',
                'phone' => $request->phone
            ]);
        }else{
            return response()->json([
                'type' => 'error',
                'message' => 'OTP Failed verified. Please Insert correct OTP',
            ]);
        }
    }
}
