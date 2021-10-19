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
        for ($i = 1; $i <= 5; $i++) {
            $vaccination = new Vaccination();
            $vaccination->name_of_vaccine = 'Mordana';
            $vaccination->date_of_first_dose = Carbon::now()->addDays(-90);
            $vaccination->date_of_second_dose = Carbon::now()->addDays(-60);;
            $vaccination->antibody_last_date = Carbon::now()->addDays(120);
            $vaccination->status = 1;;
            $vaccination->user_id = $i;
            $vaccination->center_id = 1;
            $vaccination->save();
        }
    }
}
