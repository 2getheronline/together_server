<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        DB::table("tags")->truncate();

        factory(App\Tag::class, 30)
            ->create();

        $tags = Tag::pluck('id');
        $missions = App\Mission::pluck('id');

        for ($i = 0; $i < 100; $i++){
            DB::table('missions_tags')->insert([
                'missionId' => $faker->randomElement($missions),
                'tagId' => $faker->randomElement($tags)
            ]);
        }
    }
}
