<?php

namespace App\Http\Controllers\RapidPCRCenterAdministrator;

use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Models\RapidPCRCenter;
use App\Models\RapidPCRPrice;
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
        $rapidPcrCenterId = Auth::user()->rapid_pcr_center_id;
        $rapidPcrCenterPrice = RapidPCRPrice::where('rapid_pcr_center_id', $rapidPcrCenterId)->first();
        return view('RapidPCRCenterAdministrator.pricing.index', compact('rapidPcrCenterPrice'));
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
            'pcr_premium'  => 'required',
        ]);

        $price = RapidPCRPrice::where('id', $id)->first();
        $price->pcr_normal = $request->pcr_normal;
        $price->pcr_premium = $request->pcr_premium;
        $price->status = 0;
        $price->save();

        Session::flash('message', 'Successfully Updated!');
        return redirect()->route('rapidPcrCenterAdministrator.price.index');

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
