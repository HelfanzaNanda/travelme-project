<?php

use Illuminate\Database\Seeder;

class DriverSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $driver = factory(\App\Driver::class, 10)->create();
    }
}
