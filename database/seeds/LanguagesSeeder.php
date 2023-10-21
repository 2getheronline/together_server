<?php

use Illuminate\Database\Seeder;
use App\Language;
use Illuminate\Support\Facades\DB;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::findOrNew(1)->fill(["id" => 1, "name" => "English", 'language' => 'en'])->save();
        Language::findOrNew(2)->fill(["id" => 2, "name" => "עברית", 'language' => 'he'])->save();
        Language::findOrNew(3)->fill(["id" => 3, "name" => "Purtogus", 'language' => 'pt'])->save();


    }
}
