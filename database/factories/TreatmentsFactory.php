<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Treatment;
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

$factory->define(Treatment::class, function (Faker $faker) {
    return [
        'name'     => 'Full Body Massage',
        'duration' => 60,
        'price'    => 35,
    ];
});
