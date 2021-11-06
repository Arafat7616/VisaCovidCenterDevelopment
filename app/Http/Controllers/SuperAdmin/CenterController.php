<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Center;
use Illuminate\Http\Request;

class CenterController extends Controller
{
   public function index(){
       $centers = Center::orderBy('id', 'DESC')->get();
       return view('SuperAdmin.manageCenter.index', compact('centers'));
   }
}
