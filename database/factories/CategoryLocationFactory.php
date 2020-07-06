<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\CategoryLocation;
use App\Location;
use Faker\Generator as Faker;

$factory->define(CategoryLocation::class, function (Faker $faker) {
    return [
        'location_id' => Location::inRandomOrder()->first(),
        'category_id' => Category::inRandomOrder()->first(),
    ];
});
