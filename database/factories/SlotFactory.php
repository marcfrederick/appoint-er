<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Slot;
use Faker\Generator as Faker;

$factory->define(Slot::class, function (Faker $faker) {
    return [
        'start' => $faker->dateTimeThisYear('+1 year'),
        'duration' => $faker->randomElement([30, 60, 90, 120]),
        'location_id' => \App\Location::inRandomOrder()->first(),
        'user_id' => \App\User::inRandomOrder()->first(),
    ];
});
