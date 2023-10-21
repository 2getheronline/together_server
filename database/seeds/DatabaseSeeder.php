<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlatformSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(MissionSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(ActivitiesSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(LevelsSeeder::class);
        $this->call(LanguagesSeeder::class);
    }
}
