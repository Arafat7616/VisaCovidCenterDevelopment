<?php

use App\Models\PcrTest;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PcrTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // demo pcrTest adding
        for ($i = 1; $i <= 5; $i++) {
            $pcrTest = new PcrTest();
            $pcrTest->date_of_pcr_test = Carbon::now()->addDays(-8);
            $pcrTest->pcr_result = true;
            $pcrTest->status = true;
            $pcrTest->user_id = $i;
            $pcrTest->center_id = 1;
            $pcrTest->save();
        }

        for ($i = 6; $i <= 10; $i++) {
            $pcrTest = new PcrTest();
            $pcrTest->date_of_pcr_test = Carbon::now()->addDays(-8);
            $pcrTest->pcr_result = false;
            $pcrTest->status = true;
            $pcrTest->user_id = $i;
            $pcrTest->center_id = 1;
            $pcrTest->save();
        }
    }
}
