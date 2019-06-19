<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Appointments;
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

$factory->define(Appointments::class, function (Faker $faker) {
    
    $i = rand(0, 3);
    $type = [
        [
            'name'     => 'Full Body Massage',
            'duration' => 60,
        ], [
            'name'     => 'Back, Neck, Shoulder Massage',
            'duration' => 30, 
        ], [
            'name'     => 'Foot Massage', 
            'duration' => 30, 
            
        ], [
            'name'     => 'Indian Head Massage',
            'duration' => 30,
        ],
    ];

    return [
        'date' => $faker->dateTime($max = 'now', $timezone = null),
        'type' => $faker->$type[$i]['name'],
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'duration' => $faker->$type[$i]['duration'],
        'client_id' => $faker->randomDigitNotNull,
    ];
});
