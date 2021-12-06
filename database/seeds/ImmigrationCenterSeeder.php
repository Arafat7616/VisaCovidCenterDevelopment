<?php

use App\Models\ImmigrationCenter;
use Illuminate\Database\Seeder;

class ImmigrationCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // demo immigration center adding
        // for ($i = 1; $i <= 10; $i++) {
        $immigrationCenter = new ImmigrationCenter();
        $immigrationCenter->name = 'Demo Immigration Center';
        $immigrationCenter->email = 'ic@gmail.com';
        $immigrationCenter->country_id = 18;
        $immigrationCenter->state_id = 348;
        $immigrationCenter->city_id = 7291;
        $immigrationCenter->airport_name = 'Hajrat Shahajalal International Airport';
        $immigrationCenter->status = 1;
        $immigrationCenter->save();
        // }
    }
}
