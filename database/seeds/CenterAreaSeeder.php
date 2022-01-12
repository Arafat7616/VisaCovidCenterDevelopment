<?php

use App\Models\CenterArea;
use Illuminate\Database\Seeder;

class CenterAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $centerArea = new CenterArea();
        $centerArea->title = "First class";
        $centerArea->minimum_space = 10000;
        $centerArea->maximum_space = 20000;
        $centerArea->category = "A";
        $centerArea->status = 1;
        $centerArea->save();

        $centerArea = new CenterArea();
        $centerArea->title = "Second class";
        $centerArea->minimum_space = 5000;
        $centerArea->maximum_space = 10000;
        $centerArea->category = "B";
        $centerArea->status = 1;
        $centerArea->save();

        $centerArea = new CenterArea();
        $centerArea->title = "Third class";
        $centerArea->minimum_space = 1000;
        $centerArea->maximum_space = 5000;
        $centerArea->category = "C";
        $centerArea->status = 1;
        $centerArea->save();
    }
}
