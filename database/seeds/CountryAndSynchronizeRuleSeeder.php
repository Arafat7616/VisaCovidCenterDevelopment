<?php

use App\Models\CountryAndSynchronizeRule;
use Illuminate\Database\Seeder;

class CountryAndSynchronizeRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countryAndSynchronizeRule = new CountryAndSynchronizeRule();
        $countryAndSynchronizeRule->country_id    = 17;
        $countryAndSynchronizeRule->synchronize_id  = 1;
        $countryAndSynchronizeRule->save();

        $countryAndSynchronizeRule = new CountryAndSynchronizeRule();
        $countryAndSynchronizeRule->country_id    = 17;
        $countryAndSynchronizeRule->synchronize_id  = 4;
        $countryAndSynchronizeRule->save();

        $countryAndSynchronizeRule = new CountryAndSynchronizeRule();
        $countryAndSynchronizeRule->country_id    = 17;
        $countryAndSynchronizeRule->synchronize_id  = 7;
        $countryAndSynchronizeRule->save();

        $countryAndSynchronizeRule = new CountryAndSynchronizeRule();
        $countryAndSynchronizeRule->country_id    = 20;
        $countryAndSynchronizeRule->synchronize_id  = 2;
        $countryAndSynchronizeRule->save();

        $countryAndSynchronizeRule = new CountryAndSynchronizeRule();
        $countryAndSynchronizeRule->country_id    = 20;
        $countryAndSynchronizeRule->synchronize_id  = 3;
        $countryAndSynchronizeRule->save();

        $countryAndSynchronizeRule = new CountryAndSynchronizeRule();
        $countryAndSynchronizeRule->country_id    = 20;
        $countryAndSynchronizeRule->synchronize_id  = 7;
        $countryAndSynchronizeRule->save();
    }
}
