<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centerId = Auth::user()->center_id;
        $centerPrice = Price::where('center_id', $centerId)->first();
        //return $centerPrice;
        return view('Administrator.pricing.index', compact('centerPrice'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pcr_normal'  => 'required',
            'vaccine_normal'  => 'required',
            'booster_normal'  => 'required',
            'pcr_premium'  => 'required',
            'vaccine_premium'  => 'required',
            'booster_premium'  => 'required',
        ]);

        $price = Price::where('id', $id)->first();
        $price->pcr_normal = $request->pcr_normal;
        $price->vaccine_normal = $request->vaccine_normal;
        $price->booster_normal = $request->booster_normal;
        $price->pcr_premium = $request->pcr_premium;
        $price->vaccine_premium = $request->vaccine_premium;
        $price->booster_premium = $request->booster_premium;
        $price->save();

        Session::flash('message', 'Successfully Updated!');

//        return redirect()->route('administrator.dashboard')->withSuccess('Successfully created');

        return redirect()->route('administrator.price.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        //
    }
}
