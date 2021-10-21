<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ShareController extends Controller
{
    public function shareUser($id)
    {
        $user = User::findOrFail(Crypt::decrypt($id));
        return view('Others.share-user', compact('user'));
    }
}
