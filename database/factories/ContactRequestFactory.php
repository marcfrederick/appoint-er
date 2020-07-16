<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ContactRequest;
use Faker\Generator as Faker;

$factory->define(ContactRequest::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->text('20'),
        'message' => $faker->text,
        'user_id' => $faker->randomElement([null, \App\User::inRandomOrder()->first()]),
    ];
});
