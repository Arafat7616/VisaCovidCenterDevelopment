<?php

use App\Models\City;
use App\Models\User;
use App\Models\UserInfo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Mr. Super Admin';
        $user->email = 'superadmin@gmail.com';
        $user->phone = '01732955937'; //aprobo vai
        $user->password = Hash::make('12345');
        $user->user_type = 'super-admin';
        $user->status = true;
        $user->otp = rand(5, 9999);
        $user->save();

        $user = new User();
        $user->name = 'Mr. Administrator';
        $user->email = 'administrator@gmail.com';
        $user->phone = '01749969029'; //raihan vai
        $user->password = Hash::make('12345');
        $user->user_type = 'administrator';
        $user->status = true;
        $user->center_id = 1;
        $user->otp = rand(5, 9999);
        $user->save();

        $user = new User();
        $user->name = 'Mr. Trusted Medical Assistant';
        $user->email = 'trusted-medical-assistant@gmail.com';
        $user->phone = '01303613363'; //shohan
        $user->password = Hash::make('12345');
        $user->user_type = 'trusted-medical-assistant';
        $user->status = true;
        $user->center_id = 1;
        $user->otp = rand(5, 9999);
        $user->save();

        $user = new User();
        $user->name = 'Mr. Receptionist';
        $user->email = 'receptionist@gmail.com';
        $user->phone = '01777382007'; //shohan
        $user->password = Hash::make('12345');
        $user->user_type = 'receptionist';
        $user->status = true;
        $user->center_id = 1;
        $user->otp = rand(5, 9999);
        $user->save();

        $user = new User();
        $user->name = 'Mr. Pathologist';
        $user->email = 'pathologist@gmail.com';
        $user->phone = '01732379393'; //sonat vai
        $user->password = Hash::make('12345');
        $user->user_type = 'pathologist';
        $user->status = true;
        $user->center_id = 1;
        $user->otp = rand(5, 9999);
        $user->save();

        // customer/user fake
        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->name = 'Mr. User ' . $i;
            $user->email = 'user' . $i . '@gmail.com';
            $user->phone = '0122222222' . $i;
            $user->password = Hash::make('12345');
            $user->user_type = 'user';
            $user->status = true;
            $user->center_id = 1;
            $user->otp = rand(5, 9999);
            $user->save();
        }

        // immigration officer seeded
        $user = new User();
        $user->name = 'Mr. Immigration Officer';
        $user->email = 'immigrationofficer@gmail.com';
        $user->phone = '01871006624'; // rayhan vai
        $user->password = Hash::make('12345');
        $user->user_type = 'immigration-officer';
        $user->status = true;
        $user->immigration_center_id = 1;
        $user->otp = rand(5, 9999);
        $user->save();

        // bd govt seeded
        $user = new User();
        $user->name = 'Bangladesh Govt';
        $user->email = 'bdgovt@gmail.com';
        $user->phone = '01635431430'; // joti vai
        $user->password = Hash::make('12345');
        $user->user_type = 'bd-govt';
        $user->status = true;
        $user->otp = rand(5, 9999);
        $user->save();

        // RT-PCR Administrator
        $user = new User();
        $user->name = 'RT-PCR Administrator';
        $user->email = 'rtpcr-administrator@gmail.com';
        $user->phone = '0174112233'; //random 
        $user->password = Hash::make('12345');
        $user->user_type = 'rapid-pcr-center-administrator';
        $user->status = true;
        $user->rapid_pcr_center_id = 1;
        $user->otp = rand(5, 9999);
        $user->save();

        // RT-PCR Pathologist
        $user = new User();
        $user->name = 'RT-PCR Pathologist';
        $user->email = 'rtpcr-pathologist@gmail.com';
        $user->phone = '0174223344'; //random 
        $user->password = Hash::make('12345');
        $user->user_type = 'rapid-pcr-center-pathologist';
        $user->status = true;
        $user->rapid_pcr_center_id = 1;
        $user->otp = rand(5, 9999);
        $user->save();

        // RT-PCR Receptionist
        $user = new User();
        $user->name = 'RT-PCR Receptionist';
        $user->email = 'rtpcr-receptionist@gmail.com';
        $user->phone = '0174223345'; //random
        $user->password = Hash::make('12345');
        $user->user_type = 'rapid-pcr-center-receptionist';
        $user->status = true;
        $user->rapid_pcr_center_id = 1;
        $user->otp = rand(5, 9999);
        $user->save();
    }
}
