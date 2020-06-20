<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdminSeed::class);
         $this->call(TravelSeed::class);
         $this->call(UserSeed::class);
         $this->call(OwnerSeed::class);
         //$this->call(CarSeed::class);
         //$this->call(DriverSeed::class);
         //$this->call(DepartureSeed::class);
         //$this->call(DateSeed::class);
         //$this->call(HourSeed::class);
    
    
    }
}
