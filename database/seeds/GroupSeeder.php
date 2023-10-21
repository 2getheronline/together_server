<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table("groups")->truncate();
        DB::table("group_missions")->truncate();

        factory(App\Group::class, 5)
            ->create()
            ->each(function ($group) use ($faker){
                // $group->users()->saveMany(factory(App\User::class, $faker->randomNumber(1))->make());

                $group->childs()->saveMany(
                    factory(App\Group::class, $faker->randomNumber(1))
                    ->create())
                    ->each(function ($group) use ($faker){
                        // $group->users()->saveMany(factory(App\User::class, $faker->randomNumber(1))->make());
                        $group->childs()->saveMany(
                            factory(App\Group::class, $faker->randomNumber(1))
                            ->create()
                            ->each(function ($group) use ($faker){
                                $group->users()->saveMany(factory(App\User::class, $faker->randomNumber(1))->make());
                            }));
                        // $group->manager()->createMany(factory(App\User::class, 1)->make()->toArray());
                    });

            });


            $missions = App\Mission::where('id', '<', 30)->pluck('id');
            $groups = App\Group::pluck('id');

            for ($i = 0; $i < 100; $i++){
                DB::table('group_missions')->insert([
                    'missionId' => $faker->randomElement($missions),
                    'groupId' => $faker->randomElement($groups)
                ]);
            }
    }
}
