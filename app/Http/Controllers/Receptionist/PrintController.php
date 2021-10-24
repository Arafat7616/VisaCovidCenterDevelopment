<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use App\Models\PcrTest;
use App\Models\User;
use Carbon\Carbon;
use Barryvdh\DomPDF\PDF as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintController extends Controller
{
    public function index()
    {
        $pcrTests = PcrTest::orderBy('id', 'DESC')->get();
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
