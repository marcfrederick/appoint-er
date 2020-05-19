<?php
declare(strict_types=1);

/** @var Factory $factory */

use App\Location;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Location::class, function (Faker $faker) {
    $updated = $faker->dateTimeThisYear;
    $created = $faker->dateTimeThisYear($updated);

    return [
        'created_at' => $created,
        'updated_at' => $updated,
        'title' => $faker->company,
        'description' => $faker->realText(250),
        'address_id' => factory(App\Address::class),
        'user_id' => \factory(App\User::class)
    ];
});
