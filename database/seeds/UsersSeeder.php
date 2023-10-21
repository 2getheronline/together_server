<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->truncate();
        DB::table("messages")->truncate();



        factory(App\User::class, 30)
            ->create()
            ->each(function ($user) {
                $user->messages()->saveMany(factory(App\Message::class, 3)->make());

                $user->messages()->each(function ($message) {
                    $message->childs()->saveMany(factory(App\Message::class, 3)->make());
                });
            });


    }
}
