<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DateOfDeparture;
use Faker\Generator as Faker;

$factory->define(DateOfDeparture::class, function (Faker $faker) {
    $owner = \App\Owner::pluck('id')->toArray();
    $departure = \App\Departure::pluck('id')->toArray();
    return [
        "owner_id" => $faker->randomElement($owner),
        "departure_id" => $faker->randomElement($departure),
        "date" => $faker->dateTimeBetween('2020-05-01', '2020-07-01')->format('Y-m-d')
    ];
});
