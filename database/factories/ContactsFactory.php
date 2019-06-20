<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Contact;
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

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'tel'       => $faker->phoneNumber,
        'email'     => $faker->email,
        'address'   => $faker->address,
        'client_id' => $faker->numberBetween(1, 10),
    ];
});
