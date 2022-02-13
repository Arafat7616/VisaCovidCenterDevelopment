<?php

use App\Models\CountryAndSynchronizeRole;
use Illuminate\Database\Seeder;

class CountryAndSynchronizeRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $countryAndSynchronizeRole = new CountryAndSynchronizeRole();
        $countryAndSynchronizeRole->country_id    = 17;
        $countryAndSynchronizeRole->synchronize_id  = 1;
        $countryAndSynchronizeRole->save();

        $countryAndSynchronizeRole = new CountryAndSynchronizeRole();
        $countryAndSynchronizeRole->country_id    = 17;
        $countryAndSynchronizeRole->synchronize_id  = 4;
        $countryAndSynchronizeRole->save();

        $countryAndSynchronizeRole = new CountryAndSynchronizeRole();
        $countryAndSynchronizeRole->country_id    = 17;
        $countryAndSynchronizeRole->synchronize_id  = 7;
        $countryAndSynchronizeRole->save();

        $countryAndSynchronizeRole = new CountryAndSynchronizeRole();
        $countryAndSynchronizeRole->country_id    = 20;
        $countryAndSynchronizeRole->synchronize_id  = 2;
        $countryAndSynchronizeRole->save();

        $countryAndSynchronizeRole = new CountryAndSynchronizeRole();
        $countryAndSynchronizeRole->country_id    = 20;
        $countryAndSynchronizeRole->synchronize_id  = 3;
        $countryAndSynchronizeRole->save();

        $countryAndSynchronizeRole = new CountryAndSynchronizeRole();
        $countryAndSynchronizeRole->country_id    = 20;
        $countryAndSynchronizeRole->synchronize_id  = 7;
        $countryAndSynchronizeRole->save();
    }
}
