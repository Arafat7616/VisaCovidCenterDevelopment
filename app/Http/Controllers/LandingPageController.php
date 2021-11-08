<?php

namespace App\Http\Controllers;

use App\Models\WebsiteService;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $services = WebsiteService::all();
        return view('welcome', compact('services'));
    }
}
