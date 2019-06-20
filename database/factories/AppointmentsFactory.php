<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Appointment;
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

$factory->define(Appointment::class, function (Faker $faker) {
    
    $i = rand(0, 3);
    $type = [
        [
            'name'     => 'Full Body Massage',
            'duration' => 60,
            'price'    => 35,
        ], [
            'name'     => 'Back, Neck, Shoulder Massage',
            'duration' => 30,
            'price'    => 25,
        ], [
            'name'     => 'Foot Massage', 
            'duration' => 30,
            'price'    => 25,
        ], [
            'name'     => 'Indian Head Massage',
            'duration' => 30,
            'price'    => 25,
        ],
    ];

    return [
        'date_time' => $faker->dateTime(),
        'type' => $type[$i]['name'],
        'price' => $type[$i]['price'],
        'duration' => $type[$i]['duration'],
        'client_id' => $faker->numberBetween(1, 10),
    ];
});
