<?php

use App\Appointment;
use App\Client;
use App\Treatment;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
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

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'client_id'            => factory(Client::class)->create()->id,
        'treatment_id'         => factory(Treatment::class)->create()->id,
    ];
});
