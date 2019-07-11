<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Client;
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

$factory->define(Client::class, function (Faker $faker) {
    return [
        'last_name'          => $faker->lastName,
        'first_name'         => $faker->firstName,
        'tel'                => $faker->phoneNumber,
        'email'              => $faker->email,
        'house_number'       => $faker->buildingNumber,
        'street'             => $faker->streetName,
        'town'               => $faker->city,
        'county'             => $faker->county,
        'postcode'           => $faker->postcode,
    ];
});
