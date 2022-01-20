<?php

use App\Models\Airport;
use Illuminate\Database\Seeder;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // demo airport adding
        for ($i = 1; $i <= 10; $i++) {
            $airport = new Airport();
            $airport->airport_name = 'Demo Airport-'.$i;
            $airport->country_id = 18;
            $airport->status = 1;
            $airport->save();
        }
    }
}
