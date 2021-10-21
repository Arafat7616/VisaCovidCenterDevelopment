<?php

use App\Models\Pricing;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            $pcrTest = new Pricing();
            $pcrTest->pcr_normal = 500;
            $pcrTest->vaccine_normal = 1000;
            $pcrTest->booster_normal = 700;
            $pcrTest->pcr_premimum = 1000;
            $pcrTest->vaccine_premimum = 2000;
            $pcrTest->boster_premimum = 1400;
            $pcrTest->center_id = $i;
            $pcrTest->status = true;
            $pcrTest->save();
        }
    }
}
