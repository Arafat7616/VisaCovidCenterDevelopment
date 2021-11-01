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
        for ($i = 6; $i <= 10; $i++) {
            $pcrTest = new PcrTest();
            $pcrTest->registration_type = 'normal';
            $pcrTest->sample_collection_date = Carbon::now()->addDays(-3);
            $pcrTest->date_of_pcr_test = Carbon::now()->addDays(-3);
            $pcrTest->result_published_date = Carbon::now()->addDays(-2);
            $pcrTest->pcr_result = 'positive';
            $pcrTest->user_id = $i;
            $pcrTest->center_id = 1;
            $pcrTest->tested_by = 3;
            $pcrTest->status = true;
            $pcrTest->created_at = Carbon::now()->addDays(-4);
            $pcrTest->save();
        }

        for ($i = 11; $i <= 15; $i++) {
            $pcrTest = new PcrTest();
            $pcrTest->registration_type = 'premium';
            $pcrTest->sample_collection_date = Carbon::now()->addDays(3);
            $pcrTest->date_of_pcr_test = null;
            // $pcrTest->result_published_date = Carbon::now()->addDays(-3);
            $pcrTest->pcr_result = null;
            $pcrTest->user_id = $i;
            $pcrTest->center_id = 1;
            $pcrTest->tested_by = null;
            $pcrTest->status = false;
            $pcrTest->created_at = Carbon::now()->addDays(-5);
            $pcrTest->save();
        }
    }
}
