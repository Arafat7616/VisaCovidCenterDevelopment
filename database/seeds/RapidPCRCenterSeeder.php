<?php

use App\Models\RapidPCRCenter;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class RapidPCRCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // demo RapidPCRCenter adding
      for ($i = 1; $i <= 10; $i++) {
        $rapidPCRCenter = new RapidPCRCenter();
        $rapidPCRCenter->name = 'Rapid PCr Center Name '.$i;
        $rapidPCRCenter->email = 'rpcr-center'.$i.'@gmail.com';
        $rapidPCRCenter->country_id = 18;
        $rapidPCRCenter->state_id = 348;
        $rapidPCRCenter->airport_id = 1;
        $rapidPCRCenter->city_id = 7291;
        $rapidPCRCenter->zip_code = Str::random(15);
        $rapidPCRCenter->address = 'Dhaka Bangladesh';
        $rapidPCRCenter->map_location = '#';
        $rapidPCRCenter->trade_licence_no = rand(1000000, 2000000);
        $rapidPCRCenter->status = 1;
        $rapidPCRCenter->varification_status = 1;
        $rapidPCRCenter->administrator_id = 18;
        $rapidPCRCenter->space = 5000;
        $rapidPCRCenter->save();
    }
    }
}
