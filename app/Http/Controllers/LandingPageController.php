<?php

namespace App\Http\Controllers;

use App\Models\WebsiteService;
use App\Models\WebsiteWork;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $services = WebsiteService::all();
        $weWorks = WebsiteWork::all();
        return view('welcome', compact('services','weWorks'));
    }
}
