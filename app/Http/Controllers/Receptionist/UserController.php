<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(){
        $users = User::where('center_id', Auth::user()->center_id)->where('user_type', 'user')->get();
        return view('Receptionist.user.index', compact('users'));
    }

    public function filter($searchKey){
        if($searchKey){
            $users = User::where('center_id', Auth::user()->center_id)
                ->where('user_type', 'user')
                ->where('email', 'LIKE' ,"%" . $searchKey . "%")
                ->orWhere('phone', 'LIKE' ,"%" . $searchKey . "%")
                ->orWhere('name', 'LIKE' ,"%" . $searchKey . "%")
                ->orWhere('id', 'LIKE' ,"%" . $searchKey . "%")
                ->get();
            return response()->json([
                'data' => $users,
            ]);
        }else{
            $allUsers = User::where('center_id', Auth::user()->center_id)->where('user_type', 'user')->get();
            return response()->json([
                'data' => $allUsers,
            ]);
        }

    }

    public function getUserDetails($id){

        $user = User::findOrFail($id);

        $data['user'] = User::findOrFail($id);
        $data['userInfo'] = $user->userInfo;
        $data['vaccination'] = $user->vaccination;
        $data['pcrTest'] = $user->pcrTest;
        $data['booster'] = $user->booster;
        $data['center'] = $user->center;
        $data['city'] = $user->city;
        if($user->booster){
            $data['boosterCenter'] = $user->booster->center;
        }

        if($user->vaccination){
            $data['vaccinationCenter'] = $user->vaccination->center;
        }
        if($user->pcrTest){
            $data['pcrCenter'] = $user->pcrTest->center;
        }
        return response()->json([
            'type' => 'success',
            'data' => $data,
        ]);

    }
}
