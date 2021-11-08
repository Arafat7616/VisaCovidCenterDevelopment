<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;


class LandingPageController extends Controller
{

    // banner related code starts here
    public function banner(){
        return view('SuperAdmin.setting.landingPage.banner');
    }

    public function bannerUpdate(Request $request){
        $request->validate([
            'banner_image' => 'nullable|image',

            'banner_highlight' => 'nullable|min:3',
            'banner_title' => 'nullable|min:3',
            'banner_btn_link' => 'nullable|min:1',
            'banner_description' => 'nullable|min:3',
        ]);
        try {

            update_static_option('banner_highlight', $request->banner_highlight);
            update_static_option('banner_title', $request->banner_title);
            update_static_option('banner_btn_link', $request->banner_btn_link);
            update_static_option('banner_description', $request->banner_description);

            if($request->hasFile('banner_image')){
                if (get_static_option('banner_image') != null)
                    File::delete(public_path(get_static_option('banner_image'))); //Old image delete
                $image             = $request->file('banner_image');
                $folder_path       = 'uploads/images/landing/';
                $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
                //resize and save to server
                Image::make($image->getRealPath())->save($folder_path.$image_new_name);
                update_static_option('banner_image',$folder_path.$image_new_name);
            }
        }catch (\Exception $exception){
            // return back()->withErrors( 'Something went wrong !'.$exception->getMessage());
            Session::flash('message', $exception->getMessage());
            Session::flash('type', 'warning');
            return back();
        }
        // return back()->withSuccess('Updated successfully!');
        Session::flash('message', 'Updated successfully!');
        Session::flash('type', 'success');
        return back();
    }
}
