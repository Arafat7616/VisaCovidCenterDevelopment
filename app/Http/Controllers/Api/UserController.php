<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

use App\Models\UserInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function login(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $password = $userArray['password'];
        $user = User::where('phone', $phone)->first();

       /* return response()->json([
            "message" => "fine",
            "status" => $userArray
        ]);*/

        if ($user)
        {
            if ($user->otp_verified_at == null)
            {
                $otp = rand(100000, 990000);
                $user->otp = $otp;
                $user->save();
                $message = 'Welcome to Visa Covid , your otp is : '. $otp.'. Please don\'t share your otp';
                send_sms($message, $phone);

                return response()->json([
                    "message" => "Please verify your phone : ".$user->phone.'. Please don\'t share your otp',
                    "phone" => $phone,
                    "password" => $password,
                    "status" => "2"
                ]);
            }else{
                if (Hash::check($password, $user->password))
                {
                    $otp = rand(100000, 990000);
                    $user->otp = $otp;
                    $user->save();

                    $message = 'Welcome to Visa Covid , your otp is : '. $otp.'. Please don\'t share your otp';

                    send_sms($message, $phone);

                    return response()->json([
                        "message" => "Send otp in your phone : ".$user->phone.'. Please don\'t share your otp',
                        "phone" => $phone,
                        "password" => $password,
                        "status" => "1"
                    ]);
                }else{
                    return response()->json([
                        "status" => "0",
                        "message" => "Please insert correct password"
                    ]);
                }
            }

        }else{
            return response()->json([
                "message" => "Please insert correct phone or password",
                "status" => "0",
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    public function otpResend(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];

        $existUser = User::where('phone', $phone)->first();

        if ($existUser)
        {
            $otp = rand(100000, 990000);
            $existUser->otp = $otp;
            $existUser->save();

            $message = 'Welcome to Visa Covid, your otp is : '. $otp;
            send_sms($message, $phone);


            return response()->json([
                "message"=>"Otp send in : ".$phone,
                "phone"=>$request->phone,
                "status"=>"1",
            ]);
        }else{
            return response()->json([
                "message"=>"Please insert validate otp",
                "status"=>"0",
            ]);
        }

    }

    public function otpCheck(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $otp = $userArray['otp'];

        $existUser = User::where('phone', $phone)->first();

        if ($otp == $existUser->otp)
        {
            $existUser->status = "1";
            $existUser->otp_verified_at = Carbon::now();
            $existUser->update();


            return response()->json([
                "message"=>"Otp successfully verified",
                "phone" => $existUser->phone,
                "userId" => (string)$existUser->id,
                "status"=>"1",
                "loginStatus"=>"1",
            ]);
        }else{
            return response()->json([
                "message"=>"Please insert validate otp",
                "status"=>"0",
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phone = $request->phone;
        $exitUser = User::where('phone', $phone)->orWhere('email', $request->email)->first();

        if ($exitUser)
        {
            if($exitUser->otp_verified_at == null)
            {
                $otp = rand(100000, 990000);
                $exitUser->otp = $otp;
                $exitUser->save();
                $message = 'Welcome to Visa Covid , your otp is : '. $otp.'. Please don\'t share your otp';
                send_sms($message, $phone);

                return response()->json([
                    "message" => "Please verify your phone",
                    "phone" => $phone,
                    "password" => $request->password,
                    "status" => "3"
                ]);
            }else{

                $otp = rand(100000, 990000);
                $exitUser->otp = $otp;
                $exitUser->save();
                $message = 'Welcome to Visa Covid , your otp is : '. $otp.'. Please don\'t share your otp';
                send_sms($message, $phone);

                return response()->json([
                    "message"=>"You have already account! please login",
                    "phone" => $phone,
                    "password" => $request->password,
                    "status"=>"2",
                ]);
            }
        }

        $userArray['name'] = $request->name;
        $userArray['phone'] = $request->phone;
        $userArray['email'] = $request->email;
        $userArray['otp'] = rand(100000, 990000);
        $otp = $userArray['otp'];
        $phone = $userArray['phone'];
        $userArray['user_type'] = "user";
        $userArray['password'] = Hash::make($request->password);

        $result = User::create($userArray);

        $userInfo['user_id'] = $result->id;

        UserInfo::create($userInfo);

        if ($result){

            // Send otp via helper function
            $message = 'Welcome to Covid Visa, your otp is : '. $otp.'. Please don\'t share your otp';

            send_sms($message, $phone);

            return response()->json([
                "message"=>"Otp send in : ".$request->phone." Number",
                "phone"=>$request->phone,
                "password" => $request->password,
                "status"=>"1",
            ]);
        }else{
            return response()->json([
                "message"=>"Failed to registration. Something wrong",
                "status"=>"0",
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userInfo = User::findOrFail($id);
        $user = UserInfo::where('user_id', $id)->first();

        return response()->json([
            "userInfo" => $userInfo,
            "user" => $user,
        ]);

    }

    public function uploadImage(Request $request)
    {
        return response()->json([
            "userArray"=>"ji",
        ]);

        $userArray = json_decode($request->getContent(), true);
        $phone = $userArray['phone'];
        $user = User::where('phone', $phone)->first();

        return response()->json([
            "userArray"=>$userArray,
            "message"=>$user,
        ]);

        if($request->hasFile('file_attachment')){
            $image             = $request->file('file_attachment');
            $folder_path       = 'uploads/images/users/';
            $image_new_name    = $request->name.'_profile_'.now()->timestamp.'.'.$image->getClientOriginalExtension();

            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $image = $folder_path.$image_new_name;
        }


        $user->image = $image;
        $user->update();


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function changePassword(Request $request)
    {
        $userArray = json_decode($request->getContent(), true);

        $validator = Validator::make($userArray, [
            'oldPassword' => 'required',
            'password' => 'required|confirmed|min:5',
        ]);

        $error = $validator->errors();

        if (count($error) != 0) {
            return response()->json([
                'error' => $error,
                'status' => "fail"
            ]);
        }

        $id = $userArray['id'];

        $hashPassword = User::where('id', $id)->select('password')->first();

        if (Hash::check($userArray['oldPassword'], $hashPassword))
        {
            if (!Hash::check($userArray['password'], $hashPassword))
            {
                $user = User::findOrFail($id);
                $user->password = Hash::make($userArray['password']);
                $user->update();

                return response()->json([
                    "msg"=>"Your password successfully Updated",
                    "status"=>"Success"
                ]);
            }else{
                return response()->json([
                    "msg"=>"New password same as old password",
                    "status"=>"fail"
                ]);
            }
        }else{
            return response()->json([
                "msg"=>"New password same as old password",
                "status"=>"Error"
            ]);
        }
    }
}

