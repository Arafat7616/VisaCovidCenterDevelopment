<?php

use App\Models\CovidEffected;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CovidEffectedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // demo covidEffected adding
        for ($i = 1; $i <= 5; $i++) {
            $covidEffected = new CovidEffected();
            $covidEffected->effect_status = true;
            $covidEffected->effected_date = Carbon::now()->addDays(-8);
            $covidEffected->recovery_date = Carbon::now()->addDays(-3);
            $covidEffected->document = null;
            $covidEffected->user_id = $i;
            $covidEffected->save();
        }

        for ($i = 6; $i <= 10; $i++) {
            $covidEffected = new CovidEffected();
            $covidEffected->effect_status = false;
            $covidEffected->effected_date = Carbon::now()->addDays(-8);
            $covidEffected->recovery_date = Carbon::now()->addDays(-3);
            $covidEffected->document = null;
            $covidEffected->user_id = $i;
            $covidEffected->save();
        }
    }
}
