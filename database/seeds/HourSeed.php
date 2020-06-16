<?php

use App\HourOfDeparture;
use Illuminate\Database\Seeder;

class HourSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $jam = ['18:00', '07:00'];
        for($i = 1; $i <= 4; $i++){
            for($j = 0; $j < count($jam); $j++){
                HourOfDeparture::create([
                    'owner_id' => 1,
                    'date_id' => $i,
                    'hour' => $jam[$j],
                    'seat' => 8,
                    'remaining_seat' => 8
                ]);
            }
        }

        for($i = 1; $i <= 4; $i++){
            for($j = 0; $j < count($jam); $j++){
                HourOfDeparture::create([
                    'owner_id' => 2,
                    'date_id' => $i,
                    'hour' => $jam[$j],
                    'seat' => 8,
                    'remaining_seat' => 8
                ]);
            }
        }

        for($i = 1; $i <= 4; $i++){
            for($j = 0; $j < count($jam); $j++){
                HourOfDeparture::create([
                    'owner_id' => 3,
                    'date_id' => $i,
                    'hour' => $jam[$j],
                    'seat' => 8,
                    'remaining_seat' => 8
                ]);
            }
        }
    }
}
