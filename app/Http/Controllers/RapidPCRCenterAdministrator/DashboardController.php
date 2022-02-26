<?php

namespace App\Http\Controllers\RapidPCRCenterAdministrator;

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
        return redirect()->route('rapidPcrCenterAdministrator.trustedMedicalAssistant.index');
        // return view('RapidPCRCenterAdministrator.dashboard');
    }

    public function profile(){
        $user = Auth::user();
        return view('RapidPCRCenterAdministrator.profile.index', compact('user'));
    }

    public function centerModify(){
        $countries = Country::all();
        $rapidPcrCenter = Auth::user()->rapidPcrCenter;
        return view('RapidPCRCenterAdministrator.profile.center-modify', compact('rapidPcrCenter','countries'));
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
            'centerEmail'  => 'required|email|unique:rapid_p_c_r_centers,email,'.Auth::user()->rapid_pcr_center_id,
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

        $rapidPcrCenter = Auth::user()->rapidPcrCenter;
        if (is_numeric($request->country)) {
            $rapidPcrCenter->country_id = $request->country;
        }
        if (is_numeric($request->state)) {
            $rapidPcrCenter->state_id = $request->state;
        }
        if (is_numeric($request->city)) {
            $rapidPcrCenter->city_id = $request->city;
        }
        $rapidPcrCenter->center_area_id = $center_area_id;

        $rapidPcrCenter->name = $request->centerName;
        $rapidPcrCenter->space = $request->space;
        $rapidPcrCenter->waiting_seat_capacity = $request->waitingSeatCapacity;
        $rapidPcrCenter->zip_code = $request->zipCode;
        $rapidPcrCenter->address = $request->address;
        $rapidPcrCenter->map_location = $request->mapLocation;
        $rapidPcrCenter->hotline = $request->hotline;
        $rapidPcrCenter->email = $request->centerEmail;
        $rapidPcrCenter->status = 0;
        $rapidPcrCenter->save();

        Session::flash('success', 'Updated successfully!');
        return back();
    }
}
