<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Message;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'content' => $faker->realText,
        'link' => $faker->url,
        'author' => $faker->randomNumber(1) + 1,
        "created_at" => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now'),
    ];
});
