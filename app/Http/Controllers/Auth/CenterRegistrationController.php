<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CenterRegistrationController extends Controller
{
    public function centerRegistrationDataStore(Request $request){
        $request->validate([
            'startingPoint'     =>  'required',
            'endPoint'          =>  'required',
            'totalTickets'      =>  'required',
            'dateOfJounrey'     =>  'required',
            'enquiryEndDate'    =>  'required',
        ]);
    }
}
