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
            'others_sft' => 'required',
        ]);
        try {

            update_static_option('sft_per_person', $request->sft_per_person);
            update_static_option('others_sft', $request->others_sft);    
        }catch (\Exception $exception){
            Session::flash('message', $exception->getMessage());
            Session::flash('type', 'warning');
            return redirect()->back();
        }
        // return back()->withSuccess('Updated successfully!');
        Session::flash('message', 'Updated successfully!');
        Session::flash('type', 'success');
        return redirect()->back();
    }
}
