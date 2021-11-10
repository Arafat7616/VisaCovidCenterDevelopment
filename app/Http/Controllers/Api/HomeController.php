<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\City;
use App\Models\Country;
use App\Models\Slider;
use App\Models\State;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function slider()
    {
        $sliders = Slider::where('status', '1')->select('image')->get();

        if ($sliders){
            return response()->json([
                "status" => "1",
                "sliders" => $sliders,
            ]);
        }else{
            return response()->json([
                "status" => "0",
                "message" => "Not found",
            ]);
        }
    }

    public function country()
    {
        $countries = Country::select(['id', 'name'])->get();

        if ($countries){
            return response()->json([
                "status" => "1",
                "countries" => $countries,
            ]);
        }else{
            return response()->json([
                "status" => "0",
                "message" => "Not found",
            ]);
        }

    }

    public function state($id)
    {
        $states = State::where('country_id', $id)->select(['id', 'name'])->get();
        if ($states){
            return response()->json([
                "status" => "1",
                "states" => $states,
            ]);
        }else{
            return response()->json([
                "status" => "0",
                "message" => "Not found",
            ]);
        }
    }

    public function city($id)
    {
        $cities = City::where('state_id', $id)->select(['id', 'name'])->get();
        if ($cities){
            return response()->json([
                "status" => "1",
                "cities" => $cities,
            ]);
        }else{
            return response()->json([
                "status" => "0",
                "message" => "Not found",
            ]);
        }
    }

    public function center($id)
    {
        $centers = Center::where('city_id', $id)->select(['id', 'name'])->get();
        if ($centers){
            return response()->json([
                "status" => "1",
                "centers" => $centers,
            ]);
        }else{
            return response()->json([
                "status" => "0",
                "message" => "Not found",
            ]);
        }
    }
}
