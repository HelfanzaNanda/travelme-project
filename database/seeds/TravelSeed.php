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
            'license_number' => 'connext/12345',
            'business_owner' => 'Connext Shuttle',
            'business_name' => 'Connext Shuttle',
        ]);

        Travel::create([
            'license_number' => 'rama sakti/54321',
            'business_owner' => 'rama sakti',
            'business_name' => 'Rama Sakti',
        ]);

        Travel::create([
            'license_number' => 'Oke Trans/12431',
            'business_owner' => 'oke trans',
            'business_name' => 'Oke Trans',
        ]);

        Travel::create([
            'license_number' => 'andis/12458',
            'business_owner' => 'andis travel',
            'business_name' => 'andis Travel',
        ]);

        Travel::create([
            'license_number' => 'daffa/52458',
            'business_owner' => 'daffa Travel',
            'business_name' => 'daffa Travel',
        ]);

        Travel::create([
            'license_number' => 'alvaro/52458',
            'business_owner' => 'alvaro travel',
            'business_name' => 'alvaro Travel',
        ]);

        Travel::create([
            'license_number' => 'baharitrans/52451',
            'business_owner' => 'Bahari Trans travel',
            'business_name' => 'Bahari Trans Travel',
        ]);

        Travel::create([
            'license_number' => 'madatrans/52451',
            'business_owner' => 'Mada Trans travel',
            'business_name' => 'Mada Trans Travel',
        ]);

        Travel::create([
            'license_number' => 'dragonjayaexpress/52451',
            'business_owner' => 'Dragon Jaya Express travel',
            'business_name' => 'Dragon Jaya Express Travel',
        ]);

        Travel::create([
            'license_number' => 'himatrans/52451',
            'business_owner' => 'Hima Trans',
            'business_name' => 'Hima Trans',
        ]);

        Travel::create([
            'license_number' => 'arjunoshuttle/52451',
            'business_owner' => 'Arjuno Shuttle',
            'business_name' => 'Arjuno Shuttle',
        ]);

        Travel::create([
            'license_number' => 'alloytravel/52451',
            'business_owner' => 'Alloy Travel',
            'business_name' => 'Alloy Travel',
        ]);

        Travel::create([
            'license_number' => 'fortunatravel/52451',
            'business_owner' => 'Fortuna Travel',
            'business_name' => 'Fortuna Travel',
        ]);

        Travel::create([
            'license_number' => 'zafiratrans/52451',
            'business_owner' => 'Zafira Trans',
            'business_name' => 'Zafira Trans',
        ]);

        Travel::create([
            'license_number' => 'tmtravel/52451',
            'business_owner' => 'TM Travel',
            'business_name' => 'TM Travel',
        ]);
    }
}
