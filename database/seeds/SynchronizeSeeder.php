<?php

use App\Models\Synchronize;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SynchronizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $synchronize = new Synchronize();
        $synchronize->country_id = 17;
        $synchronize->synchronize_rule = 'Pcr';
        $synchronize->status = 1;
        $synchronize->save();

        $synchronize = new Synchronize();
        $synchronize->country_id = 17;
        $synchronize->synchronize_rule = 'Booster';
        $synchronize->status = 1;
        $synchronize->save();

        $synchronize = new Synchronize();
        $synchronize->country_id = 17;
        $synchronize->synchronize_rule = 'Vaccination';
        $synchronize->status = 1;
        $synchronize->save();
    }
}
