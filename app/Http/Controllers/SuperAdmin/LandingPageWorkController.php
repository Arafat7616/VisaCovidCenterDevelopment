<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;


class LandingPageWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = WebsiteWork::all();
        return view('SuperAdmin.setting.landingPage.work.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SuperAdmin.setting.landingPage.work.create');
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
            'title' => 'required|min:1',
            'description' => 'required|min:3',
        ]);

        $work = new WebsiteWork();
        $work->title = $request->title;
        $work->description = $request->description;

        try {
            $work->save();
            // return back()->withSuccess('Updated successfully!');
            Session::flash('message', 'Stored successfully!');
            Session::flash('type', 'success');
            return back();
        } catch (\Exception $exception) {
            // return back()->withErrors( 'Something went wrong !'.$exception->getMessage());
            Session::flash('message', $exception->getMessage());
            Session::flash('type', 'warning');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebsiteWork  $WebsiteWork
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteWork $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteWork  $WebsiteWork
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteWork $work)
    {
        return view('SuperAdmin.setting.landingPage.work.edit', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteWork  $WebsiteWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteWork $work)
    {
        $request->validate([
            'title' => 'required|min:1',
            'description' => 'required|min:3',
        ]);

        $work->title = $request->title;
        $work->description = $request->description;
        try {
            $work->save();
            // return back()->withSuccess('Updated successfully!');
            Session::flash('message', 'Updated successfully!');
            Session::flash('type', 'success');
            return back();
        } catch (\Exception $exception) {
            // return back()->withErrors( 'Something went wrong !'.$exception->getMessage());
            Session::flash('message', $exception->getMessage());
            Session::flash('type', 'warning');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteWork  $WebsiteWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteWork $work)
    {
        try {
            $work->delete();
            return response()->json([
                'type' => 'success',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'type' => 'error',
                'message' => 'error' . $exception->getMessage(),
            ]);
        }
    }
}
