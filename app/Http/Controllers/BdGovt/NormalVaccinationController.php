<?php

namespace App\Http\Controllers\BdGovt;

use App\Http\Controllers\Controller;
use App\Models\Vaccination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NormalVaccinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccinations = Vaccination::where('registration_type', 'normal')->orderBy('id', 'DESC')->get();
        return view('BdGovt.vaccination.normal', compact('vaccinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // { 
    //     $vaccination = Vaccination::findOrfail($id);
    //     return view('BdGovt.vaccination.edit', compact('vaccination'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name_of_vaccine'       => 'required|string',
    //         'date_of_first_dose'    => 'required|date',
    //         'date_of_second_dose'   => 'required|date',
    //         'antibody_last_date'    => 'required|date',
    //         'status'                => 'required',
    //     ]);

    //     $vaccination = Vaccination::findOrFail($id);
    //     $vaccination->name_of_vaccine       = $request->name_of_vaccine;
    //     $vaccination->date_of_first_dose    = $request->date_of_first_dose;
    //     $vaccination->date_of_second_dose   = $request->date_of_second_dose;
    //     $vaccination->antibody_last_date    = $request->antibody_last_date;
    //     $vaccination->status                = $request->status;
    //     $vaccination->save();

    //     // return back()->withToastSuccess('Updated successfully');
    //     Session::flash('message', 'Updated successfully!');
    //     Session::flash('type', 'success');
    //     return back();
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // { 
    //     $vaccination = Vaccination::findOrfail($id);
    //     try {
    //         $vaccination->delete();
    //         return response()->json([
    //             'type' => 'success',
    //         ]);
    //     } catch (\Exception $exception) {
    //         return response()->json([
    //             'type' => 'error',
    //             'message' => 'error' . $exception->getMessage(),
    //         ]);
    //     }
    // }
}
