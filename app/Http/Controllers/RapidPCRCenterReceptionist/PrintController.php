<?php

namespace App\Http\Controllers\RapidPCRCenterReceptionist;

use App\Http\Controllers\Controller;
use App\Models\PcrTest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PrintController extends Controller
{
    public function index()
    {
        $pcrTests = PcrTest::where('rapid_pcr_center_id', Auth::user()->rapid_pcr_center_id)->where('pcr_result', '!=', null)->orderBy('result_published_date', 'DESC')->get();
        $pcrTestsOrderByDate = $pcrTests->groupBy(function ($val) {
            return Carbon::parse($val->result_published_date)->format('d/m/Y');
        });
        return view('RapidPCRCenterReceptionist.printing.index', compact('pcrTestsOrderByDate'));
    }

    public function generatePDF($id){
        $user = User::findOrFail($id);
        return view('RapidPCRCenterReceptionist.printing.user-print', compact('user'));

    }
}
