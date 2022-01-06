<?php

namespace App\Http\Controllers\RapidPCRCenterReceptionist;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AccontInfoController extends Controller
{
    public function info()
    {
        $sessionUser = Session::get('user');
        $user = User::where('phone',$sessionUser->phone)->first();
        $userInfo = UserInfo::where('user_id', $user->id)->first();

        return view('RapidPCRCenterReceptionist.new-registration.accountInfo', compact('user', 'userInfo'));
    }

    public function infoUpdate(Request $request)
    {
        $request->validate([
            'email'=>'required|email|unique:users',
            'password' => 'required|confirmed|min:5',
        ]);

        $user = User::where('phone', $request->phone)->first();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Session::flash('message', 'Successfully created!');

//        return redirect()->route('administrator.dashboard')->withSuccess('Successfully created');
        return redirect()->route('rapidPcrCenterReceptionist.dashboard');

    }
}
