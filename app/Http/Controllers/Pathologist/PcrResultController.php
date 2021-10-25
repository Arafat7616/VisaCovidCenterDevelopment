<?php

namespace App\Http\Controllers\Pathologist;

use App\Http\Controllers\Controller;
use App\Models\PcrTest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PcrResultController extends Controller
{
    public function waiting(){
        $pcrTests = PcrTest::where('center_id', Auth::user()->center_id)->where('pcr_result', null)->orderBy('created_at', 'DESC')->get();
        return view('Pathologist.pcrResult.waiting', compact('pcrTests'));
    }

    public function getPcrDetails($id){

        $pcrTest = PcrTest::findOrFail($id);

        $data['pcrTest'] = $pcrTest;
        // $data['vaccination'] = $user->vaccination;
        // $data['pcrTest'] = $user->pcrTest;
        // $data['booster'] = $user->booster;
        // $data['center'] = $user->center;
        // $data['city'] = $user->city;
        // if($user->booster){
        //     $data['boosterCenter'] = $user->booster->center;
        // }

        // if($user->vaccination){
        //     $data['vaccinationCenter'] = $user->vaccination->center;
        // }
        // if($user->pcrTest){
        //     $data['pcrCenter'] = $user->pcrTest->center;
        // }
        return response()->json([
            'type' => 'success',
            'data' => $data,
        ]);

    }
}
