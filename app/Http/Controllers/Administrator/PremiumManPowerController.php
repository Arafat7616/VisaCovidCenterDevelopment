<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\ManPowerSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PremiumManPowerController extends Controller
{
    public function index()
    {
        $manPowerShedule = ManPowerSchedule::where('type', 'premium')->where('center_id', Auth::user()->center_id)->orderBy('date', 'DESC')->first();
        return view('Administrator.premiumManPower.index', compact('manPowerShedule'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'morningSlotStart' => 'required',
            'morningSlotEnd' => 'required',
            'daySlotStart' => 'required',
            'daySlotEnd' => 'required',
            'timeForPcr' => 'required',
            'timeForVaccine' => 'required',
            'timeForBooster' => 'required',
            'volunteerForPcr' => 'required',
            'volunteerForVaccine' => 'required',
            'volunteerForBooster' => 'required',
        ]);

        $oldManPower = ManPowerSchedule::where('type', 'premium')->where('center_id', Auth::user()->center_id)->orderBy('date', 'DESC')->first();
        if($oldManPower){
            if ($oldManPower->date = Carbon::today())
            {
                $manPowerSchedule = $oldManPower;
            }else{
                $manPowerSchedule = new ManPowerSchedule();
            }
        }else{
            $manPowerSchedule = new ManPowerSchedule();
        }

        $manPowerSchedule->type                     = 'premium';
        $manPowerSchedule->morning_starting_time    = $request->morningSlotStart;
        $manPowerSchedule->morning_ending_time      = $request->morningSlotEnd;
        $manPowerSchedule->day_starting_time        = $request->daySlotStart;
        $manPowerSchedule->day_ending_time          = $request->daySlotEnd;
        $manPowerSchedule->volunteer_for_pcr        = $request->volunteerForPcr;
        $manPowerSchedule->volunteer_for_vaccine    = $request->volunteerForVaccine;
        $manPowerSchedule->volunteer_for_booster    = $request->volunteerForBooster;
        $manPowerSchedule->date                     = Carbon::now();
        $manPowerSchedule->pcr_time                 = $request->timeForPcr;
        $manPowerSchedule->vaccine_time             = $request->timeForVaccine;
        $manPowerSchedule->booster_time             = $request->timeForBooster;
        $manPowerSchedule->center_id                = Auth::user()->center_id;

        try {
            $manPowerSchedule->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Schedule uploaded successfully !',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'type' => 'warning',
                'message' => 'Something going wrong. ' . $exception->getMessage(),
            ]);
        }
    }
}
