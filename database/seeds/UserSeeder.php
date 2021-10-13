<?php

use App\Models\City;
use App\Models\User;
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
        $user->name = 'Super Admin';
        $user->email = 'superadmin@gmail.com';
        $user->phone = null;
        $user->password = Hash::make('12345');
        $user->user_type = 'super-admin';
        $user->status = 1;
        $user->otp = rand(5, 9999);
        $user->save();

        $user = new User();
        $user->name = 'Administrator';
        $user->email = 'administrator@gmail.com';
        $user->phone = null;
        $user->password = Hash::make('12345');
        $user->user_type = 'administrator';
        $user->status = 1;
        $user->otp = rand(5, 9999);
        $user->save();

        $user = new User();
        $user->name = 'Volunteer';
        $user->email = 'volunteer@gmail.com';
        $user->phone = null;
        $user->password = Hash::make('12345');
        $user->user_type = 'volunteer';
        $user->status = 1;
        $user->otp = rand(5, 9999);
        $user->save();

        $user = new User();
        $user->name = 'Receptionist';
        $user->email = 'receptionist@gmail.com';
        $user->phone = null;
        $user->password = Hash::make('12345');
        $user->user_type = 'receptionist';
        $user->status = 1;
        $user->otp = rand(5, 9999);
        $user->save();

        $user = new User();
        $user->name = 'Pathologist';
        $user->email = 'pathologist@gmail.com';
        $user->phone = null;
        $user->password = Hash::make('12345');
        $user->user_type = 'pathologist';
        $user->status = 1;
        $user->otp = rand(5, 9999);
        $user->save();

    }
}
