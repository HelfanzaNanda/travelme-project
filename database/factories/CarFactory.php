<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    $owner = \App\Owner::pluck('id')->toArray();
    return [
        "owner_id" => $faker->randomElement($owner),
        "number_plate" => $faker->unique()->randomDigit,
        "photo" => $faker->imageUrl($width = 200, $height = 200),
        "facility" => $faker->streetName,
        "seat" => $faker->randomNumber(),
        "status" => true
    ];
});
