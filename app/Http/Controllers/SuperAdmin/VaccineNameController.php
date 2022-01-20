<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\VaccineName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class VaccineNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccineNames = VaccineName::all();
        return view('SuperAdmin.vaccineName.index', compact('vaccineNames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SuperAdmin.vaccineName.create');
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
            'name' => 'required',
            'status' => 'required',
        ]);

        $data['name'] = Str::lower($request->name);
        $data['status'] = $request->status;

        try {
            VaccineName::create($data);
            Session::flash('success', 'Successfully saved !');
            return back();
        } catch (\Exception $exception) {
            return back()->withErrors('Something went wrong. ' . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VaccineName  $vaccineName
     * @return \Illuminate\Http\Response
     */
    public function show(VaccineName $vaccineName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VaccineName  $vaccineName
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaccineName = VaccineName::findOrFail($id);
        return view('SuperAdmin.vaccineName.edit', compact('vaccineName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VaccineName  $vaccineName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $vaccineName= VaccineName::findOrFail($id);

        $vaccineName->name = Str::lower($request->name);
        $vaccineName->status = $request->status;

        //return $data;
        try {
            $vaccineName->save();
            return back()->withToastSuccess('Successfully updated.');
        } catch (\Exception $exception) {
            return back()->withErrors('Something went wrong. ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VaccineName  $vaccineName
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaccineName = VaccineName::findOrFail($id);
        try {

            $vaccineName->delete();

            return response()->json([
                'type' => 'success',
                'message' => 'Successfully Deleted !!',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
            ]);
        }
    }
}
