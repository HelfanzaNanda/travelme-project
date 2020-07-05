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
            'license_number' => 'connext/tegal/12345',
            'business_owner' => 'connext',
            'business_name' => 'Connext Tegal',
            'domicile' => 'Tegal',
        ]);

        Travel::create([
            'license_number' => 'connext/semarang/12345',
            'business_owner' => 'connext',
            'business_name' => 'Connext Semarang',
            'domicile' => 'Semarang',
        ]);

        Travel::create([
            'license_number' => 'connext/cirebon/12345',
            'business_owner' => 'connext',
            'business_name' => 'Connext Cirebon',
            'domicile' => 'Cirebon',
        ]);

        Travel::create([
            'license_number' => 'rama sakti/tegal/54321',
            'business_owner' => 'rama sakti',
            'business_name' => 'Rama Sakti Tegal',
            'domicile' => 'Tegal',
        ]);

        Travel::create([
            'license_number' => 'rama sakti/bandung/54321',
            'business_owner' => 'rama sakti',
            'business_name' => 'Rama Sakti Bandung',
            'domicile' => 'Bandung',
        ]);

        Travel::create([
            'license_number' => 'rama sakti/jogja/54321',
            'business_owner' => 'rama sakti',
            'business_name' => 'Rama Sakti Jogja',
            'domicile' => 'Jogja',
        ]);

        Travel::create([
            'license_number' => 'rama sakti/semarang/54321',
            'business_owner' => 'rama sakti',
            'business_name' => 'Rama Sakti Semarang',
            'domicile' => 'Semarang',
        ]);


        Travel::create([
            'license_number' => 'Oke Trans/Tegal/12431',
            'business_owner' => 'oke trans',
            'business_name' => 'Oke Trans Tegal',
            'domicile' => 'Tegal',
        ]);

        Travel::create([
            'license_number' => 'Oke Trans/jakarta/12431',
            'business_owner' => 'oke trans',
            'business_name' => 'Oke Trans Jakarta',
            'domicile' => 'Jakarta',
        ]);

        Travel::create([
            'license_number' => 'Oke Trans/surabaya/12431',
            'business_owner' => 'oke trans',
            'business_name' => 'Oke Trans Surabaya',
            'domicile' => 'Surabaya',
        ]);

        Travel::create([
            'license_number' => 'andis/tegal/12458',
            'business_owner' => 'andis travel',
            'business_name' => 'andis Tegal',
            'domicile' => 'Tegal',
        ]);

        Travel::create([
            'license_number' => 'andis/bandung/12453',
            'business_owner' => 'andis travel',
            'business_name' => 'andis Bandung',
            'domicile' => 'Bandung',
        ]);

        Travel::create([
            'license_number' => 'daffa/Tegal/52458',
            'business_owner' => 'daffa travel',
            'business_name' => 'daffa Tegal',
            'domicile' => 'Tegal',
        ]);

        Travel::create([
            'license_number' => 'daffa/solo/52458',
            'business_owner' => 'daffa travel',
            'business_name' => 'daffa Solo',
            'domicile' => 'Solo',
        ]);

        Travel::create([
            'license_number' => 'daffa/jogja/52458',
            'business_owner' => 'daffa travel',
            'business_name' => 'daffa Jogja',
            'domicile' => 'Jogja',
        ]);

        Travel::create([
            'license_number' => 'alvaro/tegal/52458',
            'business_owner' => 'alvaro travel',
            'business_name' => 'alvaro Tegal',
            'domicile' => 'Tegal',
        ]);

        Travel::create([
            'license_number' => 'alvaro/semarang/52458',
            'business_owner' => 'alvaro travel',
            'business_name' => 'alvaro Semarang',
            'domicile' => 'Semarang',
        ]);

        Travel::create([
            'license_number' => 'baharitrans/tegal/52451',
            'business_owner' => 'Bahari Trans travel',
            'business_name' => 'Bahari Trans Tegal',
            'domicile' => 'Tegal',
        ]);

        Travel::create([
            'license_number' => 'baharitrans/jakarta/52451',
            'business_owner' => 'Bahari Trans travel',
            'business_name' => 'Bahari Trans Jakarta',
            'domicile' => 'Jakarta',
        ]);

        Travel::create([
            'license_number' => 'madatrans/tegal/52451',
            'business_owner' => 'Mada Trans travel',
            'business_name' => 'Mada Trans Tegal',
            'domicile' => 'Tegal',
        ]);

        Travel::create([
            'license_number' => 'madatrans/jogja/52451',
            'business_owner' => 'Mada Trans travel',
            'business_name' => 'Mada Trans Jogja',
            'domicile' => 'Jogja',
        ]);

        Travel::create([
            'license_number' => 'dragonjayaexpress/tegal/52451',
            'business_owner' => 'Dragon Jaya Express travel',
            'business_name' => 'Dragon Jaya Express Tegal',
            'domicile' => 'Tegal',
        ]);

        Travel::create([
            'license_number' => 'dragonjayaexpress/jakarta/52451',
            'business_owner' => 'Dragon Jaya Express travel',
            'business_name' => 'Dragon Jaya Express Jakarta',
            'domicile' => 'Jakarta',
        ]);

        Travel::create([
            'license_number' => 'dragonjayaexpress/cirebon/52451',
            'business_owner' => 'Dragon Jaya Express travel',
            'business_name' => 'Dragon Jaya Express Cirebon',
            'domicile' => 'Cirebon',
        ]);

        Travel::create([
            'license_number' => 'himatrans/tegal/52451',
            'business_owner' => 'Hima Trans',
            'business_name' => 'Hima Trans Tegal',
            'domicile' => 'Tegal',
        ]);

        Travel::create([
            'license_number' => 'himatrans/jogja/52451',
            'business_owner' => 'Hima Trans',
            'business_name' => 'Hima Trans Jogja',
            'domicile' => 'Jogja',
        ]);

        Travel::create([
            'license_number' => 'arjunoshuttle/tegal/52451',
            'business_owner' => 'Arjuno Shuttle',
            'business_name' => 'Arjuno Shuttle Tegal',
            'domicile' => 'Tegal',
        ]);

        Travel::create([
            'license_number' => 'arjunoshuttle/semarang/52451',
            'business_owner' => 'Arjuno Shuttle',
            'business_name' => 'Arjuno Shuttle Semarang',
            'domicile' => 'Semarang',
        ]);

        Travel::create([
            'license_number' => 'alloytravel/cirebon/52451',
            'business_owner' => 'Alloy Travel',
            'business_name' => 'Alloy Travel Cirebon',
            'domicile' => 'Cirebon',
        ]);

        Travel::create([
            'license_number' => 'alloytravel/bandung/52451',
            'business_owner' => 'Alloy Travel',
            'business_name' => 'Alloy Travel Bandung',
            'domicile' => 'Bandung',
        ]);

        Travel::create([
            'license_number' => 'fortunatravel/tegal/52451',
            'business_owner' => 'Fortuna Travel',
            'business_name' => 'Fortuna Travel Tegal',
            'domicile' => 'Tegal',
        ]);

        Travel::create([
            'license_number' => 'fortunatravel/bandung/52451',
            'business_owner' => 'Fortuna Travel',
            'business_name' => 'Fortuna Travel Bandung',
            'domicile' => 'Bandung',
        ]);

        Travel::create([
            'license_number' => 'zafiratrans/tegal/52451',
            'business_owner' => 'Zafira Trans',
            'business_name' => 'Zafira Trans Tegal',
            'domicile' => 'Tegal',
        ]);

        Travel::create([
            'license_number' => 'zafiratrans/solo/52451',
            'business_owner' => 'Zafira Trans',
            'business_name' => 'Zafira Trans Solo',
            'domicile' => 'Solo',
        ]);

        Travel::create([
            'license_number' => 'tmtravel/tegal/52451',
            'business_owner' => 'TM Travel',
            'business_name' => 'TM Travel Tegal',
            'domicile' => 'Tegal',
        ]);

        Travel::create([
            'license_number' => 'tmtravel/solo/52451',
            'business_owner' => 'TM Travel',
            'business_name' => 'TM Travel Solo',
            'domicile' => 'Solo',
        ]);
    }
}
