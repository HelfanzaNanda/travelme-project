<?php

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
        $cars = factory(\App\DateOfDeparture::class, 10)->create();
    }
}
