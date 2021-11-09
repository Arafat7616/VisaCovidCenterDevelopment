<?php

use App\Models\WebsiteWork;
use Illuminate\Database\Seeder;

class WebsiteWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $work = new WebsiteWork();
        $work->title = 'Registration';
        $work->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam,necessitatibus?';
        $work->save();

        $work = new WebsiteWork();
        $work->title = 'Face Detection';
        $work->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam,necessitatibus?';
        $work->save();

        $work = new WebsiteWork();
        $work->title = 'Service';
        $work->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam,necessitatibus?';
        $work->save();

        $work = new WebsiteWork();
        $work->title = 'Liveness';
        $work->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam,necessitatibus?';
        $work->save();

        $work = new WebsiteWork();
        $work->title = 'Scan & go';
        $work->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam,necessitatibus?';
        $work->save();

        $work = new WebsiteWork();
        $work->title = 'Add Country';
        $work->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam,necessitatibus?';
        $work->save();
    }
}
