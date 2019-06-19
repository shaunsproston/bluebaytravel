<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Contacts;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(Contacts::class, function (Faker $faker) {
    return [
        'tel' => $faker->phoneNumber,
        'email' => $faker->email,
        'address' => $faker->address,
        'client_id' => $faker->numberBetween($min = 0, $max = 10),
    ];
});