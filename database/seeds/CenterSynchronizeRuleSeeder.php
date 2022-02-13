<?php

use App\Models\CenterSynchronizeRule;
use Illuminate\Database\Seeder;

class CenterSynchronizeRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for center
        $centerSynchronizeRule = new CenterSynchronizeRule();
        $centerSynchronizeRule->center_id    = 1;
        $centerSynchronizeRule->city_id    = 7291;
        $centerSynchronizeRule->synchronize_id  = 1;
        $centerSynchronizeRule->save();

        $centerSynchronizeRule = new CenterSynchronizeRule();
        $centerSynchronizeRule->center_id    = 1;
        $centerSynchronizeRule->city_id    = 7291;
        $centerSynchronizeRule->synchronize_id  = 4;
        $centerSynchronizeRule->save();

        $centerSynchronizeRule = new CenterSynchronizeRule();
        $centerSynchronizeRule->center_id    = 1;
        $centerSynchronizeRule->city_id    = 7291;
        $centerSynchronizeRule->synchronize_id  = 7;
        $centerSynchronizeRule->save();

        $centerSynchronizeRule = new CenterSynchronizeRule();
        $centerSynchronizeRule->center_id    = 1;
        $centerSynchronizeRule->city_id    = 7291;
        $centerSynchronizeRule->synchronize_id  = 2;
        $centerSynchronizeRule->save();

        $centerSynchronizeRule = new CenterSynchronizeRule();
        $centerSynchronizeRule->center_id    = 1;
        $centerSynchronizeRule->city_id    = 7291;
        $centerSynchronizeRule->synchronize_id  = 3;
        $centerSynchronizeRule->save();

        $centerSynchronizeRule = new CenterSynchronizeRule();
        $centerSynchronizeRule->center_id    = 1;
        $centerSynchronizeRule->city_id    = 7291;
        $centerSynchronizeRule->synchronize_id  = 6;
        $centerSynchronizeRule->save();


        // for rapid prc center
        $centerSynchronizeRule = new CenterSynchronizeRule();
        $centerSynchronizeRule->rapid_pcr_center_id    = 1;
        $centerSynchronizeRule->city_id    = 7291;
        $centerSynchronizeRule->synchronize_id  = 1;
        $centerSynchronizeRule->save();

        $centerSynchronizeRule = new CenterSynchronizeRule();
        $centerSynchronizeRule->rapid_pcr_center_id    = 1;
        $centerSynchronizeRule->city_id    = 7291;
        $centerSynchronizeRule->synchronize_id  = 4;
        $centerSynchronizeRule->save();

        $centerSynchronizeRule = new CenterSynchronizeRule();
        $centerSynchronizeRule->rapid_pcr_center_id    = 1;
        $centerSynchronizeRule->city_id    = 7291;
        $centerSynchronizeRule->synchronize_id  = 7;
        $centerSynchronizeRule->save();

        $centerSynchronizeRule = new CenterSynchronizeRule();
        $centerSynchronizeRule->rapid_pcr_center_id    = 1;
        $centerSynchronizeRule->city_id    = 7291;
        $centerSynchronizeRule->synchronize_id  = 2;
        $centerSynchronizeRule->save();

        $centerSynchronizeRule = new CenterSynchronizeRule();
        $centerSynchronizeRule->rapid_pcr_center_id    = 1;
        $centerSynchronizeRule->city_id    = 7291;
        $centerSynchronizeRule->synchronize_id  = 3;
        $centerSynchronizeRule->save();

        $centerSynchronizeRule = new CenterSynchronizeRule();
        $centerSynchronizeRule->rapid_pcr_center_id    = 1;
        $centerSynchronizeRule->city_id    = 7291;
        $centerSynchronizeRule->synchronize_id  = 6;
        $centerSynchronizeRule->save();
    }
}
