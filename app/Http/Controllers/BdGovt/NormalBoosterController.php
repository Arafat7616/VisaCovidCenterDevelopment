<?php

namespace App\Http\Controllers\BdGovt;

use App\Http\Controllers\Controller;
use App\Models\Booster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NormalBoosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boosters = Booster::where('registration_type', 'normal')->orderBy('id', 'DESC')->get();
        return view('BdGovt.booster.normal', compact('boosters'));
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
    public function edit($id)
    { 
        $booster = Booster::findOrfail($id);
        return view('BdGovt.booster.edit', compact('booster'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_of_vaccine'       => 'required|string',
            'date'    => 'required|date',
            'antibody_last_date'    => 'required|date',
            'status'                => 'required',
        ]);

        $booster = Booster::findOrFail($id);
        $booster->name_of_vaccine       = $request->name_of_vaccine;
        $booster->date    = $request->date;
        $booster->antibody_last_date    = $request->antibody_last_date;
        $booster->status                = $request->status;
        $booster->save();

        // return back()->withToastSuccess('Updated successfully');
        Session::flash('message', 'Updated successfully!');
        Session::flash('type', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $booster = Booster::findOrfail($id);
        try {
            $booster->delete();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully Deleted !!',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'type' => 'error',
                'message' => 'error' . $exception->getMessage(),
            ]);
        }
    }
}
