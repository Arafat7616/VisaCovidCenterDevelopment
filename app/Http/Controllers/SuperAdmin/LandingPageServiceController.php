<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;


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
        return view('SuperAdmin.setting.landingPage.service.create');
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
            'image' => 'required|image',
            'description' => 'required|min:3',
        ]);

        $service = new WebsiteService();
        $service->title = $request->title;
        $service->description = $request->description;

        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'public/uploads/images/landing/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $service->image   = $folder_path . $image_new_name;
        }
        try {
            $service->save();
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
     * @param  \App\Models\WebsiteService  $WebsiteService
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteService $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteService  $WebsiteService
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteService $service)
    {
        return view('SuperAdmin.setting.landingPage.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteService  $WebsiteService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteService $service)
    {
        $request->validate([
            'title' => 'required|min:1',
            'image' => 'nullable|image',
            'description' => 'required|min:3',
        ]);

        $service->title = $request->title;
        $service->description = $request->description;

        if($request->hasFile('image')){
            if ($service->image != null)
                File::delete(public_path($service->image)); //Old image delete
            $image             = $request->file('image');
            $folder_path       = 'public/uploads/images/landing/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $service->image   = $folder_path . $image_new_name;
        }
        try {
            $service->save();
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
