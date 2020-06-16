<?php

use App\Car;
use Illuminate\Database\Seeder;

class CarSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::create([
            'owner_id' => 1,
            'number_plate' => 'G 3030 CT',
            'photo' => 'G3030CT.jpg',
            'facility' => 'Ac, Air Minum',
            'seat' => '8',
            'status' => true
        ]);

        Car::create([
            'owner_id' => 1,
            'number_plate' => 'G 4040 CT',
            'photo' => 'G4040CT.jpg',
            'facility' => 'Ac, Air Minum',
            'seat' => '8',
            'status' => true
        ]);

        Car::create([
            'owner_id' => 2,
            'number_plate' => 'G 2030 RT',
            'photo' => 'G2030RT.jpg',
            'facility' => 'Ac, Air Minum',
            'seat' => '8',
            'status' => true
        ]);

        Car::create([
            'owner_id' => 2,
            'number_plate' => 'G 1030 RT',
            'photo' => 'G1030RT.jpg',
            'facility' => 'Ac, Air Minum',
            'seat' => '8',
            'status' => true
        ]);

        Car::create([
            'owner_id' => 3,
            'number_plate' => 'G 8493 OT',
            'photo' => 'G8493OT.jpg',
            'facility' => 'Ac, Air Minum',
            'seat' => '8',
            'status' => true
        ]);

        Car::create([
            'owner_id' => 3,
            'number_plate' => 'G 8433 OT',
            'photo' => 'G8433OT.jpg',
            'facility' => 'Ac, Air Minum',
            'seat' => '8',
            'status' => true
        ]);
    }
}
