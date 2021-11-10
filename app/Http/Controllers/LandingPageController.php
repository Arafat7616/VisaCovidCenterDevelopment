<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\WebsiteService;
use App\Models\WebsiteWork;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $services = WebsiteService::all();
        $weWorks = WebsiteWork::all();
        return view('welcome', compact('services', 'weWorks'));
    }

    // subscribe Store
    public function subscribeStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        if (Subscriber::where('email', $request->email)->exists()) {
            return response()->json([
                'type' => 'success',
                'message' => 'Already Subscribed !',
            ]);
        }

        $subscribe = new Subscriber();
        $subscribe->email = $request->email;
        try {
            $subscribe->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully Subscribed !.',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'type' => 'error',
                'message' => 'Something going wrong. ' . $exception . getMessage(),
            ]);
        }
    }
}
