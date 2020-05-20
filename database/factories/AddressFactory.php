<?php
declare(strict_types=1);

/** @var Factory $factory */

use App\Address;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'street' => $faker->streetAddress,
        'postcode' => $faker->postcode,
        'city' => $faker->city,
        'country' => $faker->countryISOAlpha3
    ];
});
