<?php

use App\Models\WebsiteService;
use Illuminate\Database\Seeder;

class WebsiteServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = new WebsiteService();
        $service->title = 'Vaccine';
        $service->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam,necessitatibus?';
        $service->image = 'assets/center-part/image/landing/icon1.png';
        $service->save();

        $service = new WebsiteService();
        $service->title = 'Booster';
        $service->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam,necessitatibus?';
        $service->image = 'assets/center-part/image/landing/icon2.png';
        $service->save();

        $service = new WebsiteService();
        $service->title = 'PCR';
        $service->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam,necessitatibus?';
        $service->image = 'assets/center-part/image/landing/icon3.png';
        $service->save();

        $service = new WebsiteService();
        $service->title = 'Add Country';
        $service->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam,necessitatibus?';
        $service->image = 'assets/center-part/image/landing/icon4.png';
        $service->save();

    }
}
