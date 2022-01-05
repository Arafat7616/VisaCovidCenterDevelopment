<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use App\Models\PcrTest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PrintController extends Controller
{
    public function index()
    {
        $pcrTests = PcrTest::where('center_id', Auth::user()->center_id)->where('pcr_result', '!=', null)->orderBy('result_published_date', 'DESC')->get();
        $pcrTestsOrderByDate = $pcrTests->groupBy(function ($val) {
            return Carbon::parse($val->result_published_date)->format('d/m/Y');
        });
        return view('Receptionist.printing.index', compact('pcrTestsOrderByDate'));
    }

    public function generatePDF($id){
        $user = User::findOrFail($id);
        return view('Receptionist.printing.user-print', compact('user'));

    }
}
