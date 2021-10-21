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
    }
}
