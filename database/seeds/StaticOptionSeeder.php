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

        //Static image
        set_static_option('vaccine_success_image', 'uploads/images/setting/vaccine_success_image.png');
        set_static_option('vaccine_error_image', 'uploads/images/setting/vaccine_error_image.png');
        set_static_option('pcr_success_image', 'uploads/images/setting/pcr_success_image.png');
        set_static_option('pcr_error_image', 'uploads/images/setting/pcr_error_image.png');
        set_static_option('booster_success_image', 'uploads/images/setting/booster_success_image.png');
        set_static_option('booster_error_image', 'uploads/images/setting/booster_error_image.png');
        set_static_option('half_vaccination_image', 'uploads/images/setting/half_vaccination_image.png');

        // banner seeder
        set_static_option('banner_highlight', 'Be with us to the room around');
        set_static_option('banner_title', 'the world seamlessy');
        set_static_option('banner_description', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, omnis quos molestias consequuntur labore reiciendis asperiores laudantium exercitationem deserunt! Excepturi reiciendis totam ipsum incidunt necessitatibus fugiat asperiores sequi nulla consectetur.');
        set_static_option('banner_image', null);

        // download & service seeder
        set_static_option('service_title', 'Visa Covid Service');
        set_static_option('service_description', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita dolorem officia fugit, perspiciatis numquam sequi itaque iusto tempora suscipit quae?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, provident. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur illum esse sit quisquam molestias autem eum aspernatur sed totam, Voluptates esse aperiam magni quasi atque rem enim.');
        set_static_option('download_highlight', 'Download VISA COVID app now.');
        set_static_option('download_title', 'It\'s Completely free!');
        set_static_option('download_btn_link', '#');
        set_static_option('download_image', null);

        // how we work
        set_static_option('how_we_work_title', 'How We Work');
        set_static_option('how_we_work_description', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita dolorem officia fugit, perspiciatis numquam sequi itaque iusto tempora suscipit quae?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, provident. Lorem ipsum dolor sit amet');

        // testimonial
        set_static_option('testimonial_title', 'Thanks for your trust');
        set_static_option('testimonial_description', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita dolorem officia fugit, perspiciatis numquam sequi itaque iusto tempora suscipit quae?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, provident. Lorem ipsum dolor sit amet');
        set_static_option('pcr_test_amount', '120000');
        set_static_option('vaccine_amount', '90000');
        set_static_option('booster_amount', '80000');
        set_static_option('immigration_crossing_amount', '70000');

        // footer related info
        set_static_option('app_moto', 'Trust and be trusted');
        set_static_option('app_facebook_link', 'https://www.facebook.com/');
        set_static_option('app_linkedin_link', 'https://www.linkedin.com/');
        set_static_option('app_mail_address', 'visacovid@gmail.com');
        set_static_option('footer_details', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt expedita molestias eligendi, aliquam nisi temporibus delectus ducimus ea eveniet corporis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea inventore ullam, hic quam excepturi consectetur.');

    }
}
