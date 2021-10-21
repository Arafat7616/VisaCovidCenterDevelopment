<?php

use App\Models\Booster;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BoosterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // demo booster adding
        for ($i = 1; $i <= 5; $i++) {
            $booster = new Booster();
            $booster->name_of_vaccine = 'Mordana';
            $booster->registration_type = 'normal';
            $booster->date = Carbon::now()->addDays(-3);
            $booster->antibody_last_date = Carbon::now()->addDays(180);
            $booster->users_id = $i;
            $booster->center_id = 1;
            $booster->staff_id = 3;
            $booster->status = true;
            $booster->save();
        }

        for ($i = 6; $i <= 10; $i++) {
            $booster = new Booster();
            $booster->name_of_vaccine = 'Astrazeneca';
            $booster->registration_type = 'premium';
            $booster->date = Carbon::now()->addDays(-3);
            $booster->antibody_last_date = Carbon::now()->addDays(180);
            $booster->users_id = $i;
            $booster->center_id = 1;
            $booster->staff_id = 3;
            $booster->status = true;
            $booster->save();
        }
    }
}
