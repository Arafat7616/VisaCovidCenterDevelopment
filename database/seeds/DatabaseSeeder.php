<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StaticOptionSeeder::class);
        $this->call(WebsiteServiceSeeder::class);
        $this->call(WebsiteWorkSeeder::class);
        $this->call(SubscriberSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UserIntoSeeder::class);
        $this->call(CenterSeeder::class);
        $this->call(CovidEffectedSeeder::class);
        $this->call(PcrTestSeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(VaccinationSeeder::class);
        $this->call(BoosterSeeder::class);
        $this->call(ImmigrationCenterSeeder::class);
        $this->call(ImmigrationPassSeeder::class);
        // $this->call(SliderSeeder::class);
                                                                    
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CitySeeder1::class);
    }
}