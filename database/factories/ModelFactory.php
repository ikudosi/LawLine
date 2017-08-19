<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'first_name'    => $faker->firstName,
        'last_name'     => $faker->lastName,
        'email'         => $faker->companyEmail,
        'api_token'     => str_random(60)
    ];
});

$factory->define(App\Models\Product::class, function () {
    return [
        'name'          =>  str_random(5),
        'description'   =>  str_random(10),
        'price'         =>  random_int(10, 500)
    ];
});