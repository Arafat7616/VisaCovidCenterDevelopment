<?php

use Illuminate\Database\Seeder;

class StaticOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        set_static_option('logo', 'uploads/images/logo.png');
        set_static_option('report_wish_tag', 'Thanks for using Visa covid app.Thank you');
        set_static_option('no_image', 'uploads/images/setting/no-image.png');
        set_static_option('user', 'uploads/images/setting/user.png');

        // banner seeder 
        set_static_option('banner_highlight', 'Be with us to the room around');
        set_static_option('banner_title', 'the world seamlessy');
        set_static_option('banner_description', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, omnis quos molestias consequuntur labore reiciendis asperiores laudantium exercitationem deserunt! Excepturi reiciendis totam ipsum incidunt necessitatibus fugiat asperiores sequi nulla consectetur.');
        set_static_option('banner_btn_link', '#');
        set_static_option('banner_image', 'uploads/images/landing/banner.png');

    }
}
