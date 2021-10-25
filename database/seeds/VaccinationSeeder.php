<?php

use App\Models\Vaccination;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class VaccinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // demo vaccination adding
        for ($i = 6; $i <=10; $i++) {
            $vaccination = new Vaccination();
            $vaccination->name_of_vaccine = 'Mordana';
            $vaccination->date_of_first_dose = Carbon::now()->addDays(-90);
            // $vaccination->date_of_second_dose = Carbon::now()->addDays(-60);
            // $vaccination->date_of_first_dose = null;
            $vaccination->date_of_second_dose = null;
            $vaccination->antibody_last_date = Carbon::now()->addDays(120);
            $vaccination->status = 1;
            $vaccination->user_id = $i;
            $vaccination->center_id = 1;
            $vaccination->first_served_by_id = 3;
            $vaccination->second_served_by_id = 3;
            $vaccination->save();
        }

        for ($i = 11; $i <=15; $i++) {
            $vaccination = new Vaccination();
            $vaccination->name_of_vaccine = 'Astrazeneca';
            $vaccination->date_of_first_dose = Carbon::now()->addDays(-88);
            // $vaccination->date_of_second_dose = Carbon::now()->addDays(-58);
            // $vaccination->date_of_first_dose = null;
            $vaccination->date_of_second_dose = null;
            $vaccination->antibody_last_date = Carbon::now()->addDays(118);
            $vaccination->status = 1;
            $vaccination->user_id = $i;
            $vaccination->center_id = 1;
            $vaccination->first_served_by_id = 3;
            $vaccination->second_served_by_id = 3;
            $vaccination->save();
        }
    }
}
