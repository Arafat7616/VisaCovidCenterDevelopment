<?php

use App\Models\Price;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            $pcrTest = new Price();
            $pcrTest->pcr_normal = 500;
            $pcrTest->vaccine_normal = 1000;
            $pcrTest->booster_normal = 700;
            $pcrTest->pcr_premium = 1000;
            $pcrTest->vaccine_premium = 2000;
            $pcrTest->booster_premium = 1400;
            $pcrTest->center_id = $i;
            $pcrTest->rapid_pcr_normal = 500;      
            $pcrTest->rapid_pcr_premium = 1000;
            $pcrTest->rapid_pcr_center_id = $i;
            $pcrTest->status = true;
            $pcrTest->save();
        }
    }
}
