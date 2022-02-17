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
            'type' => 'booster',
            'status' => '1',
        ]);

        Synchronize::create([
            'synchronize_rule' => 'Booster- Mordana',
            'type' => 'booster',
            'status' => '1',
        ]);

        Synchronize::create([
            'synchronize_rule' => 'Booster- Astrazeneca',
            'type' => 'booster',
            'status' => '1',
        ]);

        Synchronize::create([
            'synchronize_rule' => 'Vaccination- physzer',
            'type' => 'vaccine',
            'status' => '1',
        ]);

        Synchronize::create([
            'synchronize_rule' => 'Vaccination- Mordana',
            'type' => 'vaccine',
            'status' => '1',
        ]);

        Synchronize::create([
            'synchronize_rule' => 'Vaccination- Astrazeneca',
            'type' => 'vaccine',
            'status' => '1',
        ]);

        Synchronize::create([
            'synchronize_rule' => 'Pcr-varriant-1',
            'type' => 'pcr',
            'status' => '1',
        ]);

        Synchronize::create([
            'synchronize_rule' => 'Pcr-varriant-2',
            'type' => 'pcr',
            'status' => '1',
        ]);
        Synchronize::create([
            'synchronize_rule' => 'RT-Pcr-varriant-1',
            'type' => 'rtpcr',
            'status' => '1',
        ]);
        Synchronize::create([
            'synchronize_rule' => 'RT-Pcr-varriant-2',
            'type' => 'rtpcr',
            'status' => '1',
        ]);
    }
}
