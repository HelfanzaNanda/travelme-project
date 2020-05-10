<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\HourOfDeparture;
use Faker\Generator as Faker;

$factory->define(HourOfDeparture::class, function (Faker $faker) {
    $owner = \App\Owner::pluck('id')->toArray();
    $date = \App\DateOfDeparture::pluck('id')->toArray();
    return [
        "owner_id" => $faker->randomElement($owner),
        "date_id" => $faker->randomElement($date),
        "hour" => $faker->time('H:i'),
        "seat" => $faker->randomNumber(1),
        "remaining_seat" => $faker->randomNumber(1),
    ];
});
