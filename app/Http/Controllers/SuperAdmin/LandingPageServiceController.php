<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class LandingPageServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = WebsiteService::all();
        return view('SuperAdmin.setting.landingPage.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('backend.service.create');
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
            'highlight' => 'required|min:3',
            'title' => 'required|min:3',
            'image' => 'required|min:3',
            'description' => 'required|min:3',
        ]);

        $service = new WebsiteService();
        $service->highlight = $request->highlight;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->image = $request->image;

        try {
            $service->save();
            return back()->withSuccess('Uploaded successfully!');
        } catch (\Exception $exception) {
            return back()->withErrors('Something went wrong !' . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebsiteService  $WebsiteService
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteService $WebsiteService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteService  $WebsiteService
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteService $WebsiteService)
    {
        // return view('backend.service.edit', compact('WebsiteService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteService  $WebsiteService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteService $WebsiteService)
    {
        $request->validate([
            'highlight' => 'required|min:3',
            'title' => 'required|min:3',
            'image' => 'required|min:3',
            'description' => 'required|min:3',
        ]);

        $service = $WebsiteService;
        $service->highlight = $request->highlight;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->image = $request->image;

        try {
            $service->save();
            return back()->withSuccess('Updated successfully!');
        } catch (\Exception $exception) {
            return back()->withErrors('Something went wrong !' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteService  $WebsiteService
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteService $service)
    {
        try {
            if ($service->image != null)
                File::delete(public_path($service->image)); //Old image delete
            $service->delete();
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
