<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booking;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    return [
        'slot_id' => \App\Slot::inRandomOrder()->first(),
        'user_id' => \App\User::inRandomOrder()->first(),
    ];
});
