<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Synchronize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class SynchronizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $synchronizes = Synchronize::orderBy('id', 'DESC')->get();
        return view('SuperAdmin.synchronize.index', compact('synchronizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $countries = Country::all();
        // return view('SuperAdmin.synchronize.create', compact('countries'));
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
            'synchronize_rule' => 'required',
            'status' => 'required',
        ]);
        if (isset($request->synchronize_rule[0])) {
            foreach ($request->synchronize_rule as $key => $value) {
               if($request->synchronize_rule[$key] != null && !empty($request->synchronize_rule[$key])){
                    if (isset($request->id[$key]) && $request->id[$key]  != null) {
                        $synchronize = Synchronize::where('id', $request->id[$key])->update([
                            'synchronize_rule' => $request->synchronize_rule[$key],
                            'status' => $request->status[$key],
                        ]);
                    } else {
                        $synchronize = Synchronize::create([
                            'synchronize_rule' => $request->synchronize_rule[$key],
                            'status' => $request->status[$key],
                        ]);
                    }
               }
            }
            $msg = "Synchronize rule added successfull";
            return redirect()->back()->with('success', $msg);
        } else {
            $msg = "Plsease add some data";
            return redirect()->back()->with('error', $msg);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Synchronize  $synchronize
     * @return \Illuminate\Http\Response
     */
    public function show(Synchronize $synchronize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Synchronize  $synchronize
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $countries = Country::all();
        // $synchronize= Synchronize::findOrFail($id);
        // return view('SuperAdmin.synchronize.edit', compact('synchronize', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Synchronize  $synchronize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//         $request->validate([
//             'country_id' => 'required',
//             'synchronize_rule' => 'required',
//             'status' => 'required',
//         ]);

//         $data = $request->except('_method', '_token');
// //return $data;
//         try {
//             $synchronize = Synchronize::find($id);
//             $synchronize->update($data);
//             Session::flash('success', 'Successfully update !');
//             return back();
//         } catch (\Exception $exception) {
//             return back()->withErrors('Something went wrong. ' . $exception->getMessage());
//         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Synchronize  $synchronize
     * @return \Illuminate\Http\Response
     */
    public function destroy(Synchronize $synchronize)
    {
        // try {
        //     $synchronize->delete();
        //     return response()->json([
        //         'type' => 'success',
        //     ]);
        // } catch (\Exception $exception) {
        //     return response()->json([
        //         'type' => 'error',
        //         'message' => 'error' . $exception->getMessage(),
        //     ]);
        // }
    }

    public function ruleBasedOnConuntry(){
        $countries = Country::orderBy('name','ASC')->get();
        return view('SuperAdmin.synchronize.country-list', compact('countries'));
    }
}
