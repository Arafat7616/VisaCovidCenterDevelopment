<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function administrator(){
        $users = User::where('user_type','administrator')->orderBy('id','DESC')->get();
        return view('SuperAdmin.manageUser.administrator', compact('users'));
    }
}
