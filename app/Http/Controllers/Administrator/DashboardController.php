<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\CenterArea;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard(){
        return redirect()->route('administrator.trustedMedicalAssistant.index');
        // return view('Administrator.dashboard');
    }

    public function profile(){
        $user = Auth::user();
        return view('Administrator.profile.index', compact('user'));
    }

    public function centerModify(){
        $countries = Country::all();
        $center = Auth::user()->center;
        return view('Administrator.profile.center-modify', compact('center','countries'));
    }

    public function centerModifyPost(Request $request){
        $request->validate([
            'centerName'  => 'required',
            'country'  => 'nullable',
            'state'  => 'nullable',
            'city'  => 'nullable',
            'space'  => 'required|numeric',
            'waitingSeatCapacity'  => 'required',
            'zipCode'  => 'required',
            'address'  => 'required',
            'mapLocation'  => 'required',
            'hotline'  => 'required',
            'centerEmail'  => 'required|email|unique:centers,email,'.Auth::user()->center_id,
        ]);


        if (is_numeric($request->space)) {

            $centerArea = CenterArea::where('minimum_space','<=',$request->space)->where('maximum_space','>=',$request->space)->first();

            if($centerArea){
                $center_area_id = $centerArea->id;
            }else{
                Session::flash('error', 'Opps somthing went wrong. Your center space is too short');
                return back();
            }
        }else{
            Session::flash('error', 'Opps somthing went wrong. Your center space should be number');
            return back();
        }

        $center = Auth::user()->center;
        if (is_numeric($request->country)) {
            $center->country_id = $request->country;
        }
        if (is_numeric($request->state)) {
            $center->state_id = $request->state;
        }
        if (is_numeric($request->city)) {
            $center->city_id = $request->city;
        }
        $center->center_area_id = $center_area_id;
      
        $center->name = $request->centerName;
        $center->space = $request->space;
        $center->waiting_seat_capacity = $request->waitingSeatCapacity;
        $center->zip_code = $request->zipCode;
        $center->address = $request->address;
        $center->map_location = $request->mapLocation;
        $center->hotline = $request->hotline;
        $center->email = $request->centerEmail;
        $center->status = 0;
        $center->save();

        Session::flash('success', 'Updated successfully!');
        return back();
    }
}
