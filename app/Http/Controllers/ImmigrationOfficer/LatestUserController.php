<?php

namespace App\Http\Controllers\ImmigrationOfficer;

use App\Http\Controllers\Controller;
use App\Models\ImmigrationPass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LatestUserController extends Controller
{
   public function show(){
       $latestImmigration = ImmigrationPass::where('immigration_center_id', Auth::user()->immigration_center_id)->orderBy('id', 'desc')->first();;
       return view('ImmigrationOfficer.latestUser.show', compact('latestImmigration'));
   }
}
