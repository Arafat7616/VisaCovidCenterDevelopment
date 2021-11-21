<?php

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slider = new Slider();
        $slider->title = "Slider One";
        $slider->image = "uploads/images/slider/_slider_1636520744.jpg";
        $slider->status = "1";
        $slider->save();


        $slider = new Slider();
        $slider->title = "Slider Tow";
        $slider->image = "uploads/images/slider/_slider_1636520730.png";
        $slider->status = "1";
        $slider->save();

        $slider = new Slider();
        $slider->title = "Slider One";
        $slider->image = "uploads/images/slider/_slider_1636520721.png";
        $slider->status = "1";
        $slider->save();


    }
}
