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
        'email'         => $faker->email,
        'api_token'     => str_random(60)
    ];
});

$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    $user = factory(App\Models\User::class)->create();
    return [
        'user_id'       =>  $user->user_id,
        'name'          =>  'Doge',
        'description'   =>  'Such cute. Wow.',
        'price'         =>  9000.00
    ];
});