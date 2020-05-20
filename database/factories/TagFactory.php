<?php
declare(strict_types=1);

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'location_id' => App\Location::inRandomOrder()->first(),
        'name' => $faker->randomElement(['barber', 'doctor', 'hospital', 'cinema']),
    ];
});
