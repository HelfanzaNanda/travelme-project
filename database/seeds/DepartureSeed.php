<?php

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
        $cars = factory(\App\Departure::class, 10)->create();
    }
}
