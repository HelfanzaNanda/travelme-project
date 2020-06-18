<?php

use App\DateOfDeparture;
use Illuminate\Database\Seeder;

class DateSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 1,
                'departure_id' => 1,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 1,
                'departure_id' => 2,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 2,
                'departure_id' => 3,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 2,
                'departure_id' => 4,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 2,
                'departure_id' => 3,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 3,
                'departure_id' => 5,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 3,
                'departure_id' => 6,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 4,
                'departure_id' => 7,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 4,
                'departure_id' => 8,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 5,
                'departure_id' => 9,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 5,
                'departure_id' => 10,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 6,
                'departure_id' => 11,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 6,
                'departure_id' => 12,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 7,
                'departure_id' => 13,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 7,
                'departure_id' => 14,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 8,
                'departure_id' => 15,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 8,
                'departure_id' => 16,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 9,
                'departure_id' => 17,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 9,
                'departure_id' => 18,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 10,
                'departure_id' => 19,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 11,
                'departure_id' => 20,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 12,
                'departure_id' => 21,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=18; $i < 24 ; $i++) {
            DateOfDeparture::create([
                'owner_id' => 13,
                'departure_id' => 22,
                'date' => '2020-06-'.$i
            ]);
        }

    }
}
