<?php

use App\Models\Subscriber;
use Illuminate\Database\Seeder;

class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriber = new Subscriber();
        $subscriber->email = 'subscriber@gmail.com';
        $subscriber->save();

        $subscriber = new Subscriber();
        $subscriber->email = 'subscriber1@gmail.com';
        $subscriber->save();

        $subscriber = new Subscriber();
        $subscriber->email = 'subscriber2@gmail.com';
        $subscriber->save();

        $subscriber = new Subscriber();
        $subscriber->email = 'subscriber3@gmail.com';
        $subscriber->save();

        $subscriber = new Subscriber();
        $subscriber->email = 'subscriber4@gmail.com';
        $subscriber->save();

        $subscriber = new Subscriber();
        $subscriber->email = 'subscriber5@gmail.com';
        $subscriber->save();
    }
}
