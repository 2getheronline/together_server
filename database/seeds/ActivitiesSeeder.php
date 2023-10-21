<?php

use Illuminate\Database\Seeder;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table("activities")->truncate();

        $faker = Faker\Factory::create();
        $missions = App\Mission::pluck('id');
        $users = App\User::pluck('id');
        $actions = App\Action::pluck('id');

        for ($i = 0; $i < 500; $i++) {
            DB::table('activities')->insert([
                'missionId' => $faker->randomElement($missions),
                'userId' => $faker->randomElement($users),
                'actionId' => $faker->randomElement($actions),
            ]);
        }
    }
}
