<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CenterController extends Controller
{
   public function index(){
       $centers = Center::orderBy('id', 'DESC')->get();
       return view('SuperAdmin.manageCenter.index', compact('centers'));
   }

   public function profile($id)
   {
       $center = Center::findOrFail($id);
       return view('SuperAdmin.manageCenter.profile', compact('center'));
   }

   public function edit($id)
    {
        $center = Center::findOrFail($id);
        $countries = Country::all();
        $cities = City::all();
        $states = State::all();
        return view('SuperAdmin.manageCenter.edit', compact('center', 'countries', 'cities', 'states'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:centers,email,'.$request->id,
            'status' => 'required',
            'address' => 'required',
            'mapLocationLink' => 'required',
            'zipCode' => 'required',
            'tradeLicenceNo' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'space' => 'required',
        ]);

            // center data store
            $center =  Center::findOrFail($request->id);
            $center->name = $request->name;
            $center->email = $request->email;

            if (is_numeric($request->country)) {
                $center->country_id = $request->country;
            }
            if (is_numeric($request->state)) {
                $center->state_id = $request->state;
            }
            if (is_numeric($request->city)) {
                $center->city_id = $request->city;
            }
            if (is_numeric($request->space)) {
                $center->area = $request->space;
            }
            $center->trade_licence_no = $request->tradeLicenceNo;
            $center->address = $request->address;
            $center->zip_code = $request->zipCode;
            $center->map_location = $request->mapLocationLink;
            $center->status = $request->status;
            $center->varification_status = false;
            $center->save();

            // return back()->withToastSuccess('Updated successfully');
            Session::flash('message', 'Updated successfully!');
            Session::flash('type', 'success');
            return back();

    }

   public function activeNow($id)
   {
       $center = Center::findOrFail($id);
       $center->status = 1;
       try {
           $center->save();
           return response()->json([
               'type' => 'success',
               'message' => 'Successfully Updated'
           ]);
       } catch (\Exception $exception) {
           return response()->json([
               'type' => 'error',
               'message' => $exception->getMessage()
           ]);
       }
   }

   public function inactiveNow($id)
   {
       $center = Center::findOrFail($id);
       $center->status = 0;
       try {
           $center->save();
           return response()->json([
               'type' => 'success',
               'message' => 'Successfully Updated'
           ]);
       } catch (\Exception $exception) {
           return response()->json([
               'type' => 'error',
               'message' => $exception->getMessage()
           ]);
       }
   }

   public function deleteNow($id)
   {
       $center = Center::findOrFail($id);
       $center->deleted_at = Carbon::now();
       try {
           $center->save();
           return response()->json([
               'type' => 'success',
               'message' => 'Successfully Deleted'
           ]);
       } catch (\Exception $exception) {
           return response()->json([
               'type' => 'error',
               'message' => $exception->getMessage()
           ]);
       }
   }
}
