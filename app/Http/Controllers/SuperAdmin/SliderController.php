<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('SuperAdmin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SuperAdmin.slider.create');
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
            'image' => 'required|mimes:jpeg,png,jpg,JPG',
            'status' => 'required',
        ]);

        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/slider/';
            $image_new_name    = $request->name.'_slider_'.now()->timestamp.'.'.$image->getClientOriginalExtension();

            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $data['image'] = $folder_path.$image_new_name;
        }
        $data['title'] = $request->title;
        $data['status'] = $request->status;

        try {
            Slider::create($data);
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
        $slider= Slider::findOrFail($id);
        return view('SuperAdmin.slider.edit', compact('slider'));
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
            'image' => 'mimes:jpeg,png,jpg,JPG',
            'status' => 'required',
        ]);

        $slider= Slider::findOrFail($id);

        if($request->hasFile('image')){
            if ($slider->image != null)
            {
                File::delete(public_path($slider->image)); //Old image delete
            }

            $image             = $request->file('image');
            $folder_path       = 'uploads/images/slider/';
            $image_new_name    = $slider->name.'_slider_'.now()->timestamp.'.'.$image->getClientOriginalExtension();

            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $img = $folder_path.$image_new_name;
        }else{
            $img = $slider->image;
        }

        $slider->title = $request->title;
        $slider->image = $img;
        $slider->status = $request->status;

        //return $data;
        try {
            $slider->save();

            return back()->withToastSuccess('Successfully updated.');
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
        $slider = Slider::findOrFail($id);
        try {
            if ($slider->image != null){
                File::delete(public_path($slider->image)); //Old image delete
            }
            $slider->delete();

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
