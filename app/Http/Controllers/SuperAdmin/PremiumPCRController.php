<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\PcrTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PremiumPCRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pcrTests = PcrTest::where('registration_type', 'premium')->orderBy('id', 'DESC')->get();
        return view('SuperAdmin.pcr.premium', compact('pcrTests'));
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
        $pcrTest = PcrTest::findOrfail($id);
        return view('SuperAdmin.pcr.edit', compact('pcrTest'));
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
            'sample_collection_date' => 'required|date',
            'date_of_pcr_test' => 'required|date',
            'result_published_date' => 'required|date',
            'status' => 'required',
            'pcr_result' => 'required',
        ]);

        $pcrTest = PcrTest::findOrFail($id);
        $pcrTest->sample_collection_date = $request->sample_collection_date;
        $pcrTest->date_of_pcr_test = $request->date_of_pcr_test;
        $pcrTest->result_published_date = $request->result_published_date;
        $pcrTest->status = $request->status;
        $pcrTest->pcr_result = $request->pcr_result;
        $pcrTest->save();

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
        $pcrTest = PcrTest::findOrfail($id);
        try {
            $pcrTest->delete();
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
