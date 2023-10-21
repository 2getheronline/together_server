<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mission;
use Faker\Generator as Faker;

$factory->define(Mission::class, function (Faker $faker) {
    $images = ["https://foreignpolicy.com/wp-content/uploads/2019/11/GettyImages-943350298.jpg?w=800&h=533&quality=90",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRG-z371KAIDZhi1AWWYjF38PySPc8ST8RjQkABUF4oasBZriug&usqp=CAU",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR7N4OFppgmZflVN_h_nz6taDJsSCiEefbqCGmeob-zXv7s-HmY&usqp=CAU"];

    return [
        'name' => "postname",
        'publishDate' => $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now'),
        'deadlineDate' => $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now'),
        'level' => $faker->randomNumber(1),
        'happy' => $faker->randomDigit() % 2 == 0,
        'points' => $faker->randomNumber(2),
        'image' => $faker->randomElement($images),
        'proposedComments' => [$faker->text],
        'limit' => $faker->randomNumber(3),
        'status' => $faker->randomElement([1,2,3,4]),
        'url' => $faker->url,
        'version' => $faker->randomNumber(1),
        'platformId' => $faker->randomElement([1,2,3,4,5]),

    ];
});
