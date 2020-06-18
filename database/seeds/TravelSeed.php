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
            'business_name' => 'Connext Tegal',
            'domicile' => 'Tegal',
        ]);

        Travel::create([
            'license_number' => '12346',
            'business_owner' => 'connext alpha',
            'business_name' => 'Connext Jogja',
            'domicile' => 'Jogja',
        ]);

        Travel::create([
            'license_number' => '54321',
            'business_owner' => 'rama',
            'business_name' => 'Rama Tegal',
            'domicile' => 'Tegal',
        ]);

        Travel::create([
            'license_number' => '54322',
            'business_owner' => 'rama',
            'business_name' => 'Rama Bandung',
            'domicile' => 'Bandung',
        ]);


        Travel::create([
            'license_number' => '12431',
            'business_owner' => 'oke trans',
            'business_name' => 'Oke Trans Tegal',
            'domicile' => 'Tegal',
        ]);

        Travel::create([
            'license_number' => '12437',
            'business_owner' => 'oke trans',
            'business_name' => 'Oke Trans Jakarta',
            'domicile' => 'Jakarta'
        ]);
    }
}
