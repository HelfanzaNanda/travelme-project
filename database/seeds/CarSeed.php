<?php

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
        $cars = factory(\App\Car::class, 10)->create();
    }
}
