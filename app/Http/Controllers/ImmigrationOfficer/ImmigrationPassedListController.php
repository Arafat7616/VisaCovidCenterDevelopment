<?php

namespace App\Http\Controllers\ImmigrationOfficer;

use App\Http\Controllers\Controller;
use App\Models\ImmigrationPass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ImmigrationPassedListController extends Controller
{
    public function index(){
        $immigrationPasses = ImmigrationPass::where('immigration_center_id', Auth::user()->immigration_center_id)->orderBy('id', 'desc')->get();;
        return view('ImmigrationOfficer.immigrationPassedList.index', compact('immigrationPasses'));
    }
}
