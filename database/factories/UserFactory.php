<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $avatars = ["https://s3.amazonaws.com/uifaces/faces/twitter/kurtinc/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/Talbi_ConSept/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/91bilal/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/ky/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/myastro/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/conspirator/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/sandywoodruff/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/petrangr/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/andrewofficer/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/nfedoroff/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/dreizle/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/envex/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/borantula/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/91bilal/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/ilya_pestov/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/chrisvanderkooi/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/saschadroste/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/nessoila/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/gonzalorobaina/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/digitalmaverick/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/nckjrvs/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/dshster/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/giuliusa/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/el_fuertisimo/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/shadeed9/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/swaplord/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/dorphern/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/toddrew/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/algunsanabria/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/algunsanabria/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/vitor376/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/amayvs/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/jonsgotwood/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/xilantra/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/mslarkina/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/nacho/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/thomasschrijer/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/emmandenn/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/thibaut_re/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/artd_sign/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/nicollerich/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/arashmanteghi/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/BryanHorsey/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/oaktreemedia/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/marrimo/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/drewbyreese/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/giuliusa/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/leandrovaranda/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/thekevinjones/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/jjsiii/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/dorphern/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/mr_shiznit/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/yalozhkin/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/ssiskind/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/victorDubugras/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/mattsapii/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/dshster/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/benefritz/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/carlosm/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/S0ufi4n3/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/desastrozo/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/andreas_pr/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/francis_vega/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/sementiy/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/bassamology/128.jpg", "https://s3.amazonaws.com/uifaces/faces/twitter/harry_sistalam/128.jpg"];
    return [
        'name' => $faker->name,
        'birthdate' => $faker->date,
        // 'level' => $faker->randomElement([1,2,3]),
        'points' => $faker->randomNumber(4),
        'avatar' => $faker->randomElement($avatars),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->phoneNumber,
        'city' => $faker->city,
        'country' => $faker->country,
        "created_at" => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now'),
    ];
});
