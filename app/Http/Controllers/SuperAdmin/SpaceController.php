<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SpaceController extends Controller
{
   
    public function index()
    {
        return view('SuperAdmin.setting.landingPage.space.index');
    }

   
    public function spaceUpdate(Request $request){
        $request->validate([
            'sft_per_person' => 'required',
        ]);
        try {

            update_static_option('sft_per_person', $request->sft_per_person);
        }catch (\Exception $exception){
            Session::flash('error', $exception->getMessage());
            return redirect()->back();
        }
        // return back()->withSuccess('Updated successfully!');
        Session::flash('success', 'Updated successfully!');

        return redirect()->back();
    }
}
