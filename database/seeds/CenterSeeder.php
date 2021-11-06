<?php

use App\Models\Center;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class CenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // demo center adding
        for ($i = 1; $i <= 10; $i++) {
            $center = new Center();
            $center->name = 'Demo Center Name';
            $center->email = 'center'.$i.'@gmail.com';
            $center->country_id = 18;
            $center->state_id = 338;
            $center->city_id = 7264;
            $center->zip_code = Str::random(15);
            $center->address = 'Dhaka Bangladesh';
            $center->map_location = '#';
            $center->trade_licence_no = rand(1000000, 2000000);
            $center->status = 1;
            $center->varification_status = 1;
            $center->administrator_id = 1;
            $center->save();
        }
    }
}
