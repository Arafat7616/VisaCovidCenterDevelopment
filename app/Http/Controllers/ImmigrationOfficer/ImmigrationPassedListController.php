<?php

namespace App\Http\Controllers\ImmigrationOfficer;

use App\Http\Controllers\Controller;
use App\Models\ImmigrationPass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ImmigrationPassedListController extends Controller
{
    public function index()
    {
        $immigrationPasses = ImmigrationPass::where('immigration_center_id', Auth::user()->immigration_center_id)->orderBy('id', 'DESC')->get();
        return view('ImmigrationOfficer.immigrationPassed.index', compact('immigrationPasses'));
    }

    public function show($id)
    {
        $immigrationPass = ImmigrationPass::findOrFail($id);
        return view('ImmigrationOfficer.immigrationPassed.show', compact('immigrationPass'));
    }
}
