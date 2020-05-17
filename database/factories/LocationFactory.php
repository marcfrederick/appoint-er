<?php

/** @var Factory $factory */

use App\Location;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Location::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'description' => $faker->realText(250),
        'address_id' => factory(App\Address::class),
        'user_id' => \factory(App\User::class)
    ];
});
