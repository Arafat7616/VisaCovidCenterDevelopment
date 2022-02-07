<?php

use App\Models\Synchronize;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SynchronizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Synchronize::create([
            'synchronize_rule' => 'Booster- physzer',
            'status' => '1'
        ]);

        Synchronize::create([
            'synchronize_rule' => 'Booster- Mordana',
            'status' => '1'
        ]);

        Synchronize::create([
            'synchronize_rule' => 'Booster- Astrazeneca',
            'status' => '1'
        ]);

        Synchronize::create([
            'synchronize_rule' => 'Vaccination- physzer',
            'status' => '1'
        ]);

        Synchronize::create([
            'synchronize_rule' => 'Vaccination- Mordana',
            'status' => '1'
        ]);

        Synchronize::create([
            'synchronize_rule' => 'Vaccination- Astrazeneca',
            'status' => '1'
        ]);

        Synchronize::create([
            'synchronize_rule' => 'Pcr',
            'status' => '1'
        ]);
    }
}
