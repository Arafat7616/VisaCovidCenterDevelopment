<?php

use App\Models\ManPowerSchedule;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ManPowerScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = -10; $i < 20; $i++) {
            ManPowerSchedule::create([
                'type' => 'normal',
                'morning_starting_time' => '10:00',
                'morning_ending_time' => '13:00',
                'day_starting_time' => '14:00',
                'day_ending_time' => '22:00',
                'trusted_medical_assistant_for_pcr' => '7',
                'pcr_available_set' => 1155,
                'trusted_medical_assistant_for_vaccine' => '6',
                'vaccine_available_set' => 792,
                'trusted_medical_assistant_for_booster' => '5',
                'booster_available_set' => 550,
                'date' => Carbon::now()->addDays($i),
                'pcr_time' => '4',
                'vaccine_time' => '5',
                'booster_time' => '6',
                'center_id' => 1,
                'rapid_pcr_center_id' => NULL
            ]);
        }
        for ($i = -10; $i < 20; $i++) {
            ManPowerSchedule::create([
                'type' => 'normal',
                'morning_starting_time' => '10:00',
                'morning_ending_time' => '13:00',
                'day_starting_time' => '14:00',
                'day_ending_time' => '22:00',
                'trusted_medical_assistant_for_pcr' => '10',
                'pcr_available_set' => 1320,
                'trusted_medical_assistant_for_vaccine' => NULL,
                'vaccine_available_set' => 0,
                'trusted_medical_assistant_for_booster' => NULL,
                'booster_available_set' => 0,
                'date' => Carbon::now()->addDays($i),
                'pcr_time' => '5',
                'vaccine_time' => NULL,
                'booster_time' => NULL,
                'center_id' => NULL,
                'rapid_pcr_center_id' => 1,
            ]);
        }
    }
}
