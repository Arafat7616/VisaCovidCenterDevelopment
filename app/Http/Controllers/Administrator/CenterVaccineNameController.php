<?php

namespace App\Http\Controllers\Administrator;


use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\CenterVaccineName;
use App\Models\User;
use App\Models\VaccineName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CenterVaccineNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centerId = User::where('id', Auth::user()->id)->select('center_id')->first();
        $vaccineNames = CenterVaccineName::where('center_id', $centerId->center_id)->get();
        return view('Administrator.centerVaccineName.index', compact('vaccineNames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vaccineNames = VaccineName::where('status', '1')->get();
        return view('Administrator.centerVaccineName.create', compact('vaccineNames'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'vaccineName' => 'required',
            'status' => 'required',
        ]);

        $centerVaccineName = CenterVaccineName::where('vaccineName', $request->vaccineName)->first();

        if ($centerVaccineName)
        {
            return back()->withErrors('Already Taken !! Please select another one');
        }

        $centerId = User::where('id', Auth::user()->id)->select('center_id')->first();
        $cityId = Center::where('administrator_id', Auth::user()->id)->select('city_id')->first();
        $data['vaccineName'] = Str::lower($request->vaccineName);
        $data['center_id'] = $centerId->center_id;
        $data['city_id'] = $cityId->city_id;
        $data['status'] = $request->status;

        try {
            CenterVaccineName::create($data);
            Session::flash('success', 'Successfully saved !');
            return back();
        } catch (\Exception $exception) {
            return back()->withErrors('Something went wrong. ' . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CenterVaccineName  $centerVaccineName
     * @return \Illuminate\Http\Response
     */
    public function show(CenterVaccineName $centerVaccineName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CenterVaccineName  $centerVaccineName
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $centerVaccineName = CenterVaccineName::findOrFail($id);
        $vaccineNames = VaccineName::where('status', '1')->get();
        return view('Administrator.centerVaccineName.edit', compact('centerVaccineName', 'vaccineNames'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CenterVaccineName  $centerVaccineName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $centerVaccineName = CenterVaccineName::findOrFail($id);
        $request->validate([
            'vaccineName' => 'required',
            'status' => 'required',
        ]);

        $centerVaccineName->vaccineName = Str::lower($request->vaccineName);
        $centerVaccineName->status = $request->status;

        try {
            $centerVaccineName->save();
            Session::flash('success', 'Successfully Update !');
            return redirect()->route('administrator.centerVaccine.index');
        } catch (\Exception $exception) {
            return back()->withErrors('Something went wrong. ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CenterVaccineName  $centerVaccineName
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            CenterVaccineName::findOrFail($id)->delete();
            Session::flash('success', 'Successfully Deleted !');
            return back();
        } catch (\Exception $exception) {
            return back()->withErrors('Something went wrong. ' . $exception->getMessage());
        }

    }
}
