<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Departure;
use Faker\Generator as Faker;

$factory->define(Departure::class, function (Faker $faker) {
    $owner = \App\Owner::pluck('id')->toArray();
    $logo = ['Bandung', 'Bekasi', 'Bogor', 'Jakarta', 'Jogja', 'Magelang', 'Malang',
        'Semarang', 'Solo', 'Surabaya', 'Tanggerang'];

    $dest = $logo[$faker->randomNumber('1')];

    for ($i = 0; $i< count($logo); $i++){
        return [
            "owner_id" => $faker->randomElement($owner),
            "from" => "tegal",
            "destination" => $dest,
            "photo_destination" => $dest.'.jpg',
            "price" => $faker->randomNumber('1').'0000',
        ];
    }
});
