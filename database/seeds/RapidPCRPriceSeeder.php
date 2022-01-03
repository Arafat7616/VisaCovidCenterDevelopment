<?php

use App\Models\RapidPCRPrice;
use Illuminate\Database\Seeder;

class RapidPCRPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            $pcrTest = new RapidPCRPrice();
            $pcrTest->pcr_normal = 500;      
            $pcrTest->pcr_premium = 1000;
            $pcrTest->rapid_pcr_center_id = $i;
            $pcrTest->status = true;
            $pcrTest->save();
        }
    }
}
