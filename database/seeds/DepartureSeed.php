<?php

use App\Departure;
use Illuminate\Database\Seeder;

class DepartureSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departure::create([
            'owner_id' => 1,
            'from' => 'tegal',
            'destination' => 'Jakarta',
            'photo_destination' => 'Jakarta.jpg',
            'price' => 90000,
        ]);

        Departure::create([
            'owner_id' => 1,
            'from' => 'tegal',
            'destination' => 'Bandung',
            'photo_destination' => 'Bandung.jpg',
            'price' => 70000,
        ]);

        Departure::create([
            'owner_id' => 1,
            'from' => 'tegal',
            'destination' => 'Bogor',
            'photo_destination' => 'Bogor.jpg',
            'price' => 80000,

        ]);

        Departure::create([
            'owner_id' => 2,
            'from' => 'tegal',
            'destination' => 'Semarang',
            'photo_destination' => 'Semarang.jpg',
            'price' => 80000,

        ]);

        Departure::create([
            'owner_id' => 2,
            'from' => 'tegal',
            'destination' => 'Jogja',
            'photo_destination' => 'Jogja.jpg',
            'price' => 90000,

        ]);

        Departure::create([
            'owner_id' => 2,
            'from' => 'tegal',
            'destination' => 'Solo',
            'photo_destination' => 'Solo.jpg',
            'price' => 80000,

        ]);

        Departure::create([
            'owner_id' => 3,
            'from' => 'tegal',
            'destination' => 'Surabaya',
            'photo_destination' => 'Surabaya.jpg',
            'price' => 100000,
        ]);

        Departure::create([
            'owner_id' => 3,
            'from' => 'tegal',
            'destination' => 'Malang',
            'photo_destination' => 'Malang.jpg',
            'price' => 100000,
        ]);

        Departure::create([
            'owner_id' => 3,
            'from' => 'tegal',
            'destination' => 'Magelang',
            'photo_destination' => 'Magelang.jpg',
            'price' => 100000,
        ]);
    }
}
