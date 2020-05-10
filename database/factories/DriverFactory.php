<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Driver;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(Driver::class, function (Faker $faker) {
    $owner = \App\Owner::pluck('id')->toArray();
    $car = \App\Car::pluck('id')->toArray();
    return [
        "owner_id" => $faker->randomElement($owner),
        "car_id" => $faker->randomElement($car),
        "nik" => $faker->buildingNumber,
        "sim" => $faker->buildingNumber,
        "name" => $faker->name,
        "gender" => $faker->randomElements(['m', 'f']),
        "email" => $faker->unique()->email,
        "password" => Hash::make($faker->phoneNumber),
        "avatar" => $faker->imageUrl($width = 200, $height = 200),
        "address" => $faker->address,
        "telephone" => $faker->unique()->phoneNumber,
        'api_token' => Str::random(80),
        "active" => true
    ];
});
