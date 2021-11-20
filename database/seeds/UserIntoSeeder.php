<?php

use Carbon\Carbon;
use App\Models\UserInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UserIntoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // customer/user
        for ($i = 1; $i <= 10; $i++) {
            $userInfo = new UserInfo();
            $userInfo->dob = Carbon::now()->addDays(-3650);
            $userInfo->gender = 'Male';
            $userInfo->nid_no =  rand(1000000, 2000000);
            $userInfo->passport_no = rand(1000000, 2000000);
            $userInfo->father_name = Str::random(15);
            $userInfo->mother_name = Str::random(15);
            $userInfo->blood_group = 'A+';
            $userInfo->present_address = 'Dhaka Bangladesh';
            $userInfo->permanent_address = 'Dhaka Banani';
            $userInfo->country_id = 18;
            $userInfo->state_id = 338;
            $userInfo->city_id = 7264;
            $userInfo->user_id = $i + 5;
            $userInfo->save();
        }

        for ($i = 1; $i <= 5; $i++) {
            $userInfo = new UserInfo();
            $userInfo->dob = Carbon::now()->addDays(-3660);
            $userInfo->gender = 'Female';
            $userInfo->nid_no =  rand(1000000, 2000000);
            $userInfo->passport_no = rand(1000000, 2000000);
            $userInfo->father_name = Str::random(15);
            $userInfo->mother_name = Str::random(15);
            $userInfo->blood_group = 'A-';
            $userInfo->present_address = 'Dhaka Bangladesh';
            $userInfo->permanent_address = 'Dhaka Tejgaon';
            $userInfo->country_id = 18;
            $userInfo->state_id = 338;
            $userInfo->city_id = 7264;
            $userInfo->user_id = $i;
            $userInfo->save();
        }

        $userInfo = new UserInfo();
        $userInfo->dob = null;
        $userInfo->gender = null;
        $userInfo->nid_no =  null;
        $userInfo->passport_no = null;
        $userInfo->father_name = null;
        $userInfo->mother_name = null;
        $userInfo->blood_group = null;
        $userInfo->present_address = null;
        $userInfo->permanent_address = null;
        $userInfo->country_id = 18;
        $userInfo->state_id = 338;
        $userInfo->city_id = 7264;
        $userInfo->user_id = 17;
        $userInfo->save();
    }
}
