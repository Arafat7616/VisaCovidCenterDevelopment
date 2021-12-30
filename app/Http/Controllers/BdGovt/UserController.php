<?php

namespace App\Http\Controllers\BdGovt;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function administrator()
    {
        $users = User::where('user_type', 'administrator')->orderBy('id', 'DESC')->get();
        return view('BdGovt.manageUser.administrator', compact('users'));
    }

    public function volunteer()
    {
        $users = User::where('user_type', 'trusted-medical-assistant')->orderBy('id', 'DESC')->get();
        return view('BdGovt.manageUser.volunteer', compact('users'));
    }

    public function receptionist()
    {
        $users = User::where('user_type', 'receptionist')->orderBy('id', 'DESC')->get();
        return view('BdGovt.manageUser.receptionist', compact('users'));
    }

    public function pathologist()
    {
        $users = User::where('user_type', 'pathologist')->orderBy('id', 'DESC')->get();
        return view('BdGovt.manageUser.pathologist', compact('users'));
    }

    public function user()
    {
        $users = User::where('user_type', 'user')->orderBy('id', 'DESC')->get();
        return view('BdGovt.manageUser.user', compact('users'));
    }

    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('BdGovt.manageUser.profile', compact('user'));
    }

    // public function edit($id)
    // {
    //     $user = User::findOrFail($id);
    //     $countries = Country::all();
    //     $cities = City::all();
    //     $states = State::all();
    //     return view('BdGovt.manageUser.edit', compact('user', 'countries', 'cities', 'states'));
    // }

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
    //         'country' => 'required',
    //         'state' => 'required',
    //         'city' => 'required',
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
    //         if (is_numeric($request->country)) {
    //             $userInfo->country_id = $request->country;
    //         }
    //         if (is_numeric($request->state)) {
    //             $userInfo->state_id = $request->state;
    //         }
    //         if (is_numeric($request->city)) {
    //             $userInfo->city_id = $request->city;
    //         }
    
    //         $userInfo->save();
    //         // return back()->withToastSuccess('Updated successfully');
    //         Session::flash('message', 'Updated successfully!');
    //         Session::flash('type', 'success');
    //         return back();

    // }

    // public function activeNow($id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->status = 1;
    //     try {
    //         $user->save();
    //         return response()->json([
    //             'type' => 'success',
    //             'message' => 'Successfully Updated'
    //         ]);
    //     } catch (\Exception $exception) {
    //         return response()->json([
    //             'type' => 'error',
    //             'message' => $exception->getMessage()
    //         ]);
    //     }
    // }

    // public function inactiveNow($id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->status = 0;
    //     try {
    //         $user->save();
    //         return response()->json([
    //             'type' => 'success',
    //             'message' => 'Successfully Updated'
    //         ]);
    //     } catch (\Exception $exception) {
    //         return response()->json([
    //             'type' => 'error',
    //             'message' => $exception->getMessage()
    //         ]);
    //     }
    // }

    // public function deleteNow($id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->deleted_at = Carbon::now();
    //     try {
    //         $user->save();
    //         return response()->json([
    //             'type' => 'success',
    //             'message' => 'Successfully Deleted'
    //         ]);
    //     } catch (\Exception $exception) {
    //         return response()->json([
    //             'type' => 'error',
    //             'message' => $exception->getMessage()
    //         ]);
    //     }
    // }
}
