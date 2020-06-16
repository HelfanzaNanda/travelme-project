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
        for ($i=16; $i < 20; $i++) { 
            DateOfDeparture::create([
                'owner_id' => 1,
                'departure_id' => 1,
                'date' => '2020-06-'.$i
            ]);

            DateOfDeparture::create([
                'owner_id' => 1,
                'departure_id' => 2,
                'date' => '2020-06-'.$i
            ]);

            DateOfDeparture::create([
                'owner_id' => 1,
                'departure_id' => 3,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=16; $i < 20; $i++) { 
            DateOfDeparture::create([
                'owner_id' => 2,
                'departure_id' => 4,
                'date' => '2020-06-'.$i
            ]);

            DateOfDeparture::create([
                'owner_id' => 2,
                'departure_id' => 5,
                'date' => '2020-06-'.$i
            ]);

            DateOfDeparture::create([
                'owner_id' => 2,
                'departure_id' => 6,
                'date' => '2020-06-'.$i
            ]);
        }

        for ($i=16; $i < 20; $i++) { 
            DateOfDeparture::create([
                'owner_id' => 3,
                'departure_id' => 7,
                'date' => '2020-06-'.$i
            ]);

            DateOfDeparture::create([
                'owner_id' => 3,
                'departure_id' => 8,
                'date' => '2020-06-'.$i
            ]);

            DateOfDeparture::create([
                'owner_id' => 3,
                'departure_id' => 9,
                'date' => '2020-06-'.$i
            ]);
        }
    }
}
