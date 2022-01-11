<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\CenterArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CenterAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centerAreas = CenterArea::all();
        return view('SuperAdmin.centerArea.index', compact('centerAreas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SuperAdmin.centerArea.create');
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
            'title' => 'required',
            'minimum_space' => 'required',
            'maximum_space' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        $centerArea = new CenterArea();
        $centerArea->title = $request->title;
        $centerArea->minimum_space = $request->minimum_space;
        $centerArea->maximum_space = $request->maximum_space;
        $centerArea->category = $request->category;
        $centerArea->status = $request->status;

        try {
            $centerArea->save();
            // return back()->withToastSuccess('Successfully saved.');
            Session::flash('message', 'Successfully saved !');
            Session::flash('type', 'success');
            return back();
        } catch (\Exception $exception) {
            return back()->withErrors('Something went wrong. ' . $exception->getMessage());
        }
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
        $centerArea = CenterArea::findOrfail($id);
        return view('SuperAdmin.centerArea.edit', compact('centerArea'));
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
            'title' => 'required',
            'minimum_space' => 'required',
            'maximum_space' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        $centerArea = CenterArea::findOrFail($id);
        $centerArea->title = $request->title;
        $centerArea->minimum_space = $request->minimum_space;
        $centerArea->maximum_space = $request->maximum_space;
        $centerArea->category = $request->category;
        $centerArea->status = $request->status;

        try {
            $centerArea->save();
            Session::flash('message', 'Successfully Updated !');
            Session::flash('type', 'success');
            return back();
        } catch (\Exception $exception) {
            return back()->withErrors('Something went wrong. ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $centerArea = CenterArea::findOrFail($id);
        try {
            $centerArea->delete();
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
