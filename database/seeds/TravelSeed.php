<?php

use App\Travel;
use Illuminate\Database\Seeder;

class TravelSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Travel::create([
            'license_number' => '12345',
            'business_owner' => 'connext alpha',
            'business_name' => 'connext tegal',
            'status' => '1'
        ]);

        Travel::create([
            'license_number' => '54321',
            'business_owner' => 'rama',
            'business_name' => 'Rama Tegal',
            'status' => '1'
        ]);


        Travel::create([
            'license_number' => '12431',
            'business_owner' => 'oke trans',
            'business_name' => 'Oke Trans',
            'status' => '1'
        ]);
    }
}
