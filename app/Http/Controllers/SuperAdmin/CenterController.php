<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CenterController extends Controller
{
   public function index(){
       $centers = Center::orderBy('id', 'DESC')->get();
       return view('SuperAdmin.manageCenter.index', compact('centers'));
   }

   public function profile($id)
   {
       $center = Center::findOrFail($id);
       return view('SuperAdmin.manageCenter.profile', compact('center'));
   }

   public function edit($id)
    {
        $center = Center::findOrFail($id);
        $countries = Country::all();
        $cities = City::all();
        $states = State::all();
        return view('SuperAdmin.manageCenter.edit', compact('center', 'countries', 'cities', 'states'));
    }

    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|unique:users,email,'.$request->id,
    //         'phone' => 'required|unique:users,phone,'.$request->id,
    //         'image' => 'nullable|image',
    //         'status' => 'required',
    //         'gender' => 'required',
    //         'dob' => 'required',
    //         'nidNo' => 'required',
    //         'passportNo' => 'required',
    //         'fatherName' => 'required',
    //         'motherName' => 'required',
    //         'bloodGroup' => 'required',
    //         'presentAddress' => 'required',
    //         'permanentAddress' => 'required',
    //         'countryId' => 'required',
    //         'stateId' => 'required',
    //         'cityId' => 'required',
    //     ]);

    //         // user data store
    //         $user = User::findOrFail($request->id);
    //         $user->name = $request->name;
    //         $user->email = $request->email;
    //         $user->phone = $request->phone;
    //         $user->status = $request->status;
    //         if ($request->hasFile('image')) {
    //             if ($user->image != null){
    //                 File::delete(public_path($user->image));
    //             }
    //             $image             = $request->file('image');
    //             $folder_path       = 'uploads/images/users/';
    //             $image_new_name    = Str::random(20) . '-' . now()->timestamp . '.' . $image->getClientOriginalExtension();
    //             //resize and save to server
    //             Image::make($image->getRealPath())->save($folder_path . $image_new_name);
    //             $user->image   = $folder_path . $image_new_name;
    //         }
    //         $user->save();
    
    //         // user info data store
    //         $userInfo = $user->userInfo;
    //         $userInfo->nid_no = $request->nidNo;
    //         $userInfo->passport_no = $request->passportNo;
    //         $userInfo->father_name = $request->fatherName;
    //         $userInfo->mother_name = $request->motherName;
    //         $userInfo->blood_group = $request->bloodGroup;
    //         $userInfo->present_address = $request->presentAddress;
    //         $userInfo->permanent_address = $request->permanentAddress;
    //         $userInfo->gender = $request->gender;
    //         $userInfo->dob = $request->dob;
    //         $userInfo->user_id = $user->id;
    //         if (is_numeric($request->countryId)) {
    //             $userInfo->country_id = $request->countryId;
    //         }
    //         if (is_numeric($request->stateId)) {
    //             $userInfo->state_id = $request->stateId;
    //         }
    //         if (is_numeric($request->cityId)) {
    //             $userInfo->city_id = $request->cityId;
    //         }
    
    //         $userInfo->save();
    //         // return back()->withToastSuccess('Updated successfully');
    //         Session::flash('message', 'Updated successfully!');
    //         Session::flash('type', 'success');
    //         return back();

    // }

   public function activeNow($id)
   {
       $center = Center::findOrFail($id);
       $center->status = 1;
       try {
           $center->save();
           return response()->json([
               'type' => 'success',
               'message' => 'Successfully Updated'
           ]);
       } catch (\Exception $exception) {
           return response()->json([
               'type' => 'error',
               'message' => $exception->getMessage()
           ]);
       }
   }

   public function inactiveNow($id)
   {
       $center = Center::findOrFail($id);
       $center->status = 0;
       try {
           $center->save();
           return response()->json([
               'type' => 'success',
               'message' => 'Successfully Updated'
           ]);
       } catch (\Exception $exception) {
           return response()->json([
               'type' => 'error',
               'message' => $exception->getMessage()
           ]);
       }
   }

   public function deleteNow($id)
   {
       $center = Center::findOrFail($id);
       $center->deleted_at = Carbon::now();
       try {
           $center->save();
           return response()->json([
               'type' => 'success',
               'message' => 'Successfully Deleted'
           ]);
       } catch (\Exception $exception) {
           return response()->json([
               'type' => 'error',
               'message' => $exception->getMessage()
           ]);
       }
   }
}
