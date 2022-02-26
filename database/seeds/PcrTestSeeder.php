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
            $pcrTest->date_of_registration = null;
            $pcrTest->sample_collection_date = Carbon::now()->addDays(-3);
            $pcrTest->date_of_pcr_test = Carbon::now()->addDays(-3);
            $pcrTest->result_published_date = Carbon::now()->addDays(-2);
            $pcrTest->pcr_result = 'positive';
            $pcrTest->user_id = $i;
            // $pcrTest->center_id = 1;
            // $pcrTest->synchronize_id = 7;
            $pcrTest->rapid_pcr_center_id = 1;
            $pcrTest->synchronize_id = 9;
            $pcrTest->tested_by = 3;
            $pcrTest->status = true;
            $pcrTest->created_at = Carbon::now()->addDays(-4);
            $pcrTest->save();
        }

        for ($i = 11; $i <= 15; $i++) {
            $pcrTest = new PcrTest();
            $pcrTest->registration_type = 'premium';
            $pcrTest->date_of_registration = null;
            $pcrTest->sample_collection_date = Carbon::now()->addDays(3);
            $pcrTest->date_of_pcr_test = null;
            // $pcrTest->result_published_date = Carbon::now()->addDays(-3);
            $pcrTest->pcr_result = null;
            $pcrTest->user_id = $i;
            // $pcrTest->center_id = 1;
            // $pcrTest->synchronize_id = 7;
            $pcrTest->rapid_pcr_center_id = 1;
            $pcrTest->synchronize_id = 9;
            $pcrTest->tested_by = null;
            $pcrTest->status = false;
            $pcrTest->created_at = Carbon::now()->addDays(-5);
            $pcrTest->save();
        }

        // // monir pcr
        // $pcrTest = new PcrTest();
        // $pcrTest->registration_type = 'normal';
        // $pcrTest->date_of_registration =  Carbon::now()->addDays(-2);
        // $pcrTest->sample_collection_date = Carbon::now()->addDays(-1.5);
        // $pcrTest->date_of_pcr_test =  Carbon::now()->addDays(-1);
        // $pcrTest->result_published_date =  Carbon::now()->addDays(-1);
        // $pcrTest->pcr_result = 'negative';
        // $pcrTest->user_id = 22;
        // $pcrTest->center_id = 1;
        // $pcrTest->synchronize_id = 7;
        // // $pcrTest->rapid_pcr_center_id = 1;
        // // $pcrTest->synchronize_id = 9;
        // $pcrTest->tested_by = 5;
        // $pcrTest->status = null;
        // $pcrTest->created_at = Carbon::now()->addDays(-5);
        // $pcrTest->updated_at = Carbon::now();
        // $pcrTest->save();
    }
}
