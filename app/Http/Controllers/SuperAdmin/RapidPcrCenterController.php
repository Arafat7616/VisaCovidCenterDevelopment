<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\CenterArea;
use App\Models\City;
use App\Models\Country;
use App\Models\RapidPCRCenter;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RapidPcrCenterController extends Controller
{
    public function index()
    {
        $rapidPcrCenters = RapidPCRCenter::orderBy('id', 'DESC')->get();
        return view('SuperAdmin.manageRapidPcrCenter.index', compact('rapidPcrCenters'));
    }

    public function profile($id)
    {
        $rapidPcrCenter = RapidPCRCenter::findOrFail($id);
        return view('SuperAdmin.manageRapidPcrCenter.profile', compact('rapidPcrCenter'));
    }

    public function edit($id)
    {
        $rapidPcrCenterAreas = CenterArea::where('status', 1)->get();
        $rapidPcrCenter = RapidPCRCenter::findOrFail($id);
        $countries = Country::all();
        $cities = City::all();
        $states = State::all();
        return view('SuperAdmin.manageRapidPcrCenter.edit', compact('rapidPcrCenter', 'countries', 'cities', 'states', 'rapidPcrCenterAreas'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:rapidPcrCenters,email,' . $request->id,
            'status' => 'required',
            'address' => 'required',
            'mapLocationLink' => 'required',
            'zipCode' => 'required',
            'waitingSeatCapacity' => 'required',
            'tradeLicenceNo' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'space' => 'required',
        ]);

        // rapidPcrCenter data store
        $rapidPcrCenter =  RapidPCRCenter::findOrFail($request->id);
        $rapidPcrCenter->name = $request->name;
        $rapidPcrCenter->email = $request->email;

        if (is_numeric($request->country)) {
            $rapidPcrCenter->country_id = $request->country;
        }
        if (is_numeric($request->state)) {
            $rapidPcrCenter->state_id = $request->state;
        }
        if (is_numeric($request->city)) {
            $rapidPcrCenter->city_id = $request->city;
        }
        if (is_numeric($request->space)) {
            $rapidPcrCenter->rapidPcrCenter_area_id = $request->space;
        }
        $rapidPcrCenter->trade_licence_no = $request->tradeLicenceNo;
        $rapidPcrCenter->address = $request->address;
        $rapidPcrCenter->zip_code = $request->zipCode;
        $rapidPcrCenter->waiting_seat_capacity = $request->waitingSeatCapacity;
        $rapidPcrCenter->map_location = $request->mapLocationLink;
        $rapidPcrCenter->status = $request->status;
        $rapidPcrCenter->varification_status = false;
        $rapidPcrCenter->save();

        // return back()->withToastSuccess('Updated successfully');
        Session::flash('success', 'Updated successfully!');
        return back();
    }

    public function activeNow($id)
    {
        $rapidPcrCenter = RapidPCRCenter::findOrFail($id);
        $rapidPcrCenter->status = 1;
        try {
            $rapidPcrCenter->save();
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
        $rapidPcrCenter = RapidPCRCenter::findOrFail($id);
        $rapidPcrCenter->status = 0;
        try {
            $rapidPcrCenter->save();
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
        $rapidPcrCenter = RapidPCRCenter::findOrFail($id);
        $rapidPcrCenter->deleted_at = Carbon::now();
        try {
            $rapidPcrCenter->save();
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
