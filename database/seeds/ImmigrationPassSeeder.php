<?php

use App\Models\ImmigrationPass;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ImmigrationPassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // demo immigration pass adding
        for ($i = 1; $i <= 10; $i++) {
            $immigrationPass = new ImmigrationPass();
            $immigrationPass->user_id = $i + 5;
            $immigrationPass->user_center_id = 1;
            $immigrationPass->immigration_center_id = 1;
            $immigrationPass->date = Carbon::now()->addDays(-3);
            $immigrationPass->status = 1;
            $immigrationPass->save();
        }
    }
}
