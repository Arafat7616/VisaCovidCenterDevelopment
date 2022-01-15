<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::orderBy('id', 'DESC')->get();
        return view('SuperAdmin.managePrice.index', compact('prices'));
    }

    public function profile($id)
    {
        $price = Price::findOrFail($id);
        return view('SuperAdmin.managePrice.profile', compact('price'));
    }

    public function edit($id)
    {
        $price = Price::findOrFail($id);
        return view('SuperAdmin.managePrice.edit', compact('price'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'pcr_normal'       => 'required',
            'booster_normal'   => 'required',
            'vaccine_normal'   => 'required',
            'pcr_premium'      => 'required',
            'booster_premium'  => 'required',
            'vaccine_premium'  => 'required',
            'status'           => 'required',
        ]);

        // price data store
        $price =  Price::findOrFail($request->id);
        $price->pcr_normal         = $request->pcr_normal;
        $price->booster_normal     = $request->booster_normal;
        $price->vaccine_normal     = $request->vaccine_normal;
        $price->pcr_premium        = $request->pcr_premium;
        $price->booster_premium    = $request->booster_premium;
        $price->vaccine_premium    = $request->vaccine_premium;
        $price->status             = $request->status;
        $price->save();

        // return back()->withToastSuccess('Updated successfully');
        Session::flash('success', 'Updated successfully!');

        return back();
    }

    public function activeNow($id)
    {
        $price = Price::findOrFail($id);
        $price->status = 1;
        try {
            $price->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully Updated'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'type' => 'error',
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function inactiveNow($id)
    {
        $price = Price::findOrFail($id);
        $price->status = 0;
        try {
            $price->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully Updated'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'type' => 'error',
                'message' => $exception->getMessage()
            ]);
        }
    }
}
