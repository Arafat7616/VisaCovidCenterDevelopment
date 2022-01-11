<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CenterDocument;
use App\Models\Center;
use App\Models\City;
use App\Models\Country;
use App\Models\RapidPCRCenter;
use App\Models\Price;
use App\Models\State;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RapidPCRCenterRegistrationController extends Controller
{
    public function centerRegister()
    {
        $countries = Country::all();
        return view('auth.rapid-pcr-center-register', compact('countries'));
    }

    public function centerRegisterDataStore(Request $request)
    {
        // validation request data
        $request->validate([
            'centerName'  => 'required',
            'country'  => 'nullable',
            'state'  => 'nullable',
            'airport'  => 'nullable',
            'city'  => 'nullable',
            'space'  => 'required',
            'zipCode'  => 'required',
            'hotLine'  => 'required',
            'centerEmail'  => 'required|email|unique:rapid_p_c_r_centers,email',
            'personName'  => 'required',
            'personEmail'  => 'required|email|unique:users,email',
            'personNID'  => 'required',
            'personPhone'  => 'required',
            'password' => 'min:6',
            'confirmPassword' => 'required_with:password|same:password|min:6',
            'tradeLicenseNumber'  => 'required',
            'document1' => 'nullable:mimes:pdf',
            'document2' => 'nullable:mimes:pdf',
            'document3' => 'nullable:mimes:pdf',
        ]);

        // center data store
        $rapidPcrCenter = new RapidPCRCenter();
        $rapidPcrCenter->name = $request->centerName;
        $rapidPcrCenter->email = $request->centerEmail;

        if (is_numeric($request->country)) {
            $rapidPcrCenter->country_id = $request->country;
        }
        if (is_numeric($request->state)) {
            $rapidPcrCenter->state_id = $request->state;
        }
        if (is_numeric($request->airport)) {
            $rapidPcrCenter->airport_id = $request->airport;
        }
        if (is_numeric($request->city)) {
            $rapidPcrCenter->city_id = $request->city;
        }
        if (is_numeric($request->space)) {
            $rapidPcrCenter->area = $request->space;
        }

        $rapidPcrCenter->trade_licence_no = $request->tradeLicenseNumber;
        $rapidPcrCenter->address = $request->address;
        $rapidPcrCenter->zip_code = $request->zipCode;
        $rapidPcrCenter->map_location = $request->mapLocation;
        $rapidPcrCenter->status = false;
        $rapidPcrCenter->varification_status = false;
        $rapidPcrCenter->save();

        // user data store
        $user = new User();
        $user->name = $request->personName;
        $user->email = $request->personEmail;
        $user->phone = $request->personPhone;
        $user->rapid_pcr_center_id = $rapidPcrCenter->id;
        $user->user_type = 'administrator';
        $user->password = Hash::make($request->password);
        $user->save();

        $rapidPcrCenter->administrator_id =  $user->id;
        $rapidPcrCenter->save();

        // user info data store
        $userInfo = new UserInfo();
        $userInfo->nid_no = $request->personNID;
        $userInfo->user_id = $user->id;
        if (is_numeric($request->country)) {
            $userInfo->country_id = $request->country;
        }
        if (is_numeric($request->state)) {
            $userInfo->state_id = $request->state;
        }
        if (is_numeric($request->city)) {
            $userInfo->city_id = $request->city;
        }

        $userInfo->save();

        $price = New Price();
        $price->rapid_pcr_center_id = $rapidPcrCenter->id;
        $price->status = "1";
        $price->save();

        // document data store
        if ($request->hasFile('document1')) {
            $document = new CenterDocument();
            $pdf             = $request->document1;
            $folder_path       = 'uploads/images/documents/';
            $pdf_new_name    = Str::random(20) . '-' . now()->timestamp . '.' . $pdf->getClientOriginalExtension();
            // save to server
            $request->document1->move(public_path($folder_path), $pdf_new_name);
            $document->rapid_pcr_document   = $folder_path . $pdf_new_name;
            $document->user_id   = $user->id;
            $document->rapid_pcr_center_id   = $rapidPcrCenter->id;
            $document->status   = 1;
            $document->save();
        }
        if ($request->hasFile('document2')) {
            $document = new CenterDocument();
            $pdf             = $request->document2;
            $folder_path       = 'uploads/images/documents/';
            $pdf_new_name    = Str::random(20) . '-' . now()->timestamp . '.' . $pdf->getClientOriginalExtension();
            // save to server
            $request->document2->move(public_path($folder_path), $pdf_new_name);
            $document->rapid_pcr_document   = $folder_path . $pdf_new_name;
            $document->user_id   = $user->id;
            $document->rapid_pcr_center_id   = $rapidPcrCenter->id;
            $document->status   = 1;
            $document->save();
        }
        if ($request->hasFile('document3')) {
            $document = new CenterDocument();
            $pdf             = $request->document3;
            $folder_path       = 'uploads/images/documents/';
            $pdf_new_name    = Str::random(20) . '-' . now()->timestamp . '.' . $pdf->getClientOriginalExtension();
            // save to server
            $request->document3->move(public_path($folder_path), $pdf_new_name);
            $document->rapid_pcr_document   = $folder_path . $pdf_new_name;
            $document->user_id   = $user->id;
            $document->rapid_pcr_center_id   = $rapidPcrCenter->id;
            $document->status   = 1;
            $document->save();
        }

        return response()->json([
            'type' => 'success',
            'message' => 'Successfully Data stored',
        ]);
    }
}
