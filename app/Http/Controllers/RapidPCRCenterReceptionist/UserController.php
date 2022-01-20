<?php

namespace App\Http\Controllers\RapidPCRCenterReceptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(){
        $users = User::where('rapid_pcr_center_id', Auth::user()->rapid_pcr_center_id)->where('user_type', 'user')->get();
        return view('RapidPCRCenterReceptionist.user.index', compact('users'));
    }

    public function getUserDetails($id){

        $user = User::findOrFail($id);

        $data['user'] = User::findOrFail($id);
        $data['userInfo'] = $user->userInfo;
        $data['vaccination'] = $user->vaccination;
        $data['pcrTest'] = $user->pcrTest;
        $data['booster'] = $user->booster;
        $data['center'] = $user->rapidPcrCenter;
        $data['city'] = $user->city;
        if($user->booster){
            $data['boosterCenter'] = $user->booster->rapidPcrCenter;
        }

        if($user->vaccination){
            $data['vaccinationCenter'] = $user->vaccination->rapidPcrCenter;
        }
        if($user->pcrTest){
            $data['pcrCenter'] = $user->pcrTest->rapidPcrCenter;
        }
        return response()->json([
            'type' => 'success',
            'data' => $data,
        ]);

    }
}
