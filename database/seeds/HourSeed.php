<?php

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
        $cars = factory(\App\HourOfDeparture::class, 10)->create();
    }
}
