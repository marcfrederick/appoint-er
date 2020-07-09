<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Locationimg;
use Faker\Generator as Faker;

$factory->define(Locationimg::class, function (Faker $faker) {
    return [
        'src' => '//placehold.it/200',
        'location_id' => 1
    ];
});
