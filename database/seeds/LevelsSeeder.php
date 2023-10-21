<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Level;

class LevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("levels")->truncate();

        Level::create(["id" => 1, "name" => "beginner", 'minPoints' => 0, 'maxPoints' => 2000]);
        Level::create(["id" => 2, "name" => "intermidate", 'minPoints' => 2001, 'maxPoints' => 6000]);
        Level::create(["id" => 3, "name" => "expert", 'minPoints' => 6001, 'maxPoints' => 10000]);
    }
}
