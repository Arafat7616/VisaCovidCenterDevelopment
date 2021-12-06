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
            'banner_description' => 'nullable|min:3',
        ]);
        try {

            update_static_option('banner_highlight', $request->banner_highlight);
            update_static_option('banner_title', $request->banner_title);
            update_static_option('banner_description', $request->banner_description);

            if($request->hasFile('banner_image')){
                if (get_static_option('banner_image') != null)
                    File::delete(public_path(get_static_option('banner_image'))); //Old image delete
                $image             = $request->file('banner_image');
                $folder_path       = 'public/uploads/images/landing/';
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

    // download related code starts here
    public function download(){
        return view('SuperAdmin.setting.landingPage.download');
    }

    public function downloadUpdate(Request $request){
        $request->validate([
            'download_image' => 'nullable|image',
            'service_description' => 'nullable|min:3',
            'download_highlight' => 'nullable|min:3',
            'download_title' => 'nullable|min:3',
            'download_btn_link' => 'nullable|min:1',
            'service_title' => 'nullable|min:3',
        ]);
        try {

            update_static_option('service_description', $request->service_description);
            update_static_option('download_highlight', $request->download_highlight);
            update_static_option('download_title', $request->download_title);
            update_static_option('download_btn_link', $request->download_btn_link);
            update_static_option('service_title', $request->service_title);

            if($request->hasFile('download_image')){
                if (get_static_option('download_image') != null)
                    File::delete(public_path(get_static_option('download_image'))); //Old image delete
                $image             = $request->file('download_image');
                $folder_path       = 'public/uploads/images/landing/';
                $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
                //resize and save to server
                Image::make($image->getRealPath())->save($folder_path.$image_new_name);
                update_static_option('download_image',$folder_path.$image_new_name);
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


    // testimonial related code starts here
    public function testimonial(){
        return view('SuperAdmin.setting.landingPage.testimonial');
    }

    public function testimonialUpdate(Request $request){
        $request->validate([
            'how_we_work_title'         => 'required|min:3',
            'how_we_work_description'   => 'required|min:3',
            'testimonial_title'         => 'required|min:3',
            'testimonial_description'   => 'required|min:3',
            'pcr_test_amount'           => 'required|min:1',
            'vaccine_amount'            => 'required|min:1',
            'booster_amount'            => 'required|min:1',
            'immigration_crossing_amount'=> 'required|min:1',
        ]);
        try {

            update_static_option('how_we_work_title', $request->how_we_work_title);
            update_static_option('how_we_work_description', $request->how_we_work_description);
            update_static_option('testimonial_title', $request->testimonial_title);
            update_static_option('testimonial_description', $request->testimonial_description);
            update_static_option('pcr_test_amount', $request->pcr_test_amount);
            update_static_option('vaccine_amount', $request->vaccine_amount);
            update_static_option('booster_amount', $request->booster_amount);
            update_static_option('immigration_crossing_amount', $request->immigration_crossing_amount);
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


    // footer related code starts here
    public function footer(){
        return view('SuperAdmin.setting.landingPage.footer');
    }

    public function footerUpdate(Request $request){
        $request->validate([
            'app_moto'                    => 'required|min:3',
            'app_facebook_link'           => 'required|min:1',
            'app_linkedin_link'           => 'required|min:1',
            'app_mail_address'            => 'required|min:1',
            'footer_details'              => 'required|min:1',
        ]);
        try {
            update_static_option('app_moto', $request->app_moto);
            update_static_option('app_facebook_link', $request->app_facebook_link);
            update_static_option('app_linkedin_link', $request->app_linkedin_link);
            update_static_option('app_mail_address', $request->app_mail_address);
            update_static_option('footer_details', $request->footer_details);
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
