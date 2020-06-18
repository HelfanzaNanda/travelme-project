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

        $jam = ['20:00', '08:00'];
        for ($x=1; $x <= 13 ; $x++) { 
            for($i = 1; $i <= 138; $i++){
                for($j = 0; $j < count($jam); $j++){
                    HourOfDeparture::create([
                        'owner_id' => $x,
                        'date_id' => $i,
                        'hour' => $jam[$j],
                        'seat' => 8,
                        'remaining_seat' => 8
                    ]);
                }
            }   
        }
    }
}
