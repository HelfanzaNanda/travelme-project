<?php

use App\Owner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OwnerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Owner::create([
            'license_number' => 'connext/12345',
            'business_owner' => 'Connext Shuttle',
            'business_name' => 'Connext Shuttle',
            'address' => 'gili tugel',
            'email' => 'connextshuttle@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '089663543355',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'rama sakti/54321',
            'business_owner' => 'rama sakti',
            'business_name' => 'Rama Sakti',
            'address' => 'jl. kol sudiarto',
            'email' => 'ramasakti@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '089663543354',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'Oke Trans/12431',
            'business_owner' => 'oke trans',
            'business_name' => 'Oke Trans',
            'address' => 'tegal',
            'email' => 'oketrans@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '089663543353',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'andis/12458',
            'business_owner' => 'andis travel',
            'business_name' => 'andis Travel',
            'address' => 'Tegal',
            'email' => 'andistravel@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08966575454',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'daffa/52458',
            'business_owner' => 'daffa Travel',
            'business_name' => 'daffa Travel',
            'address' => 'Tegal',
            'email' => 'daffatravel@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08986475489',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'alvaro/52458',
            'business_owner' => 'alvaro travel',
            'business_name' => 'alvaro Travel',
            'address' => 'Tegal',
            'email' => 'alvarotravel@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08536475335',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'baharitrans/52451',
            'business_owner' => 'Bahari Trans travel',
            'business_name' => 'Bahari Trans Travel',
            'address' => 'Tegal',
            'email' => 'baharitranstravel@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08536475391',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'madatrans/52451',
            'business_owner' => 'Mada Trans travel',
            'business_name' => 'Mada Trans Travel',
            'address' => 'Tegal',
            'email' => 'madatranstravel@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08736275391',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'dragonjayaexpress/52451',
            'business_owner' => 'Dragon Jaya Express travel',
            'business_name' => 'Dragon Jaya Express Travel',
            'address' => 'Tegal',
            'email' => 'dragonjayaexpresstravel@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08336275390',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'himatrans/52451',
            'business_owner' => 'Hima Trans',
            'business_name' => 'Hima Trans',
            'address' => 'Tegal',
            'email' => 'himatrans@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08236275321',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'arjunoshuttle/52451',
            'business_owner' => 'Arjuno Shuttle',
            'business_name' => 'Arjuno Shuttle',
            'address' => 'Tegal',
            'email' => 'arjunoshuttle@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08236225311',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'alloytravel/52451',
            'business_owner' => 'Alloy Travel',
            'business_name' => 'Alloy Travel',
            'address' => 'Tegal',
            'email' => 'alloytravel@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08236265311',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'fortunatravel/52451',
            'business_owner' => 'Fortuna Travel',
            'business_name' => 'Fortuna Travel',
            'address' => 'Tegal',
            'email' => 'fortunatravel@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08236269319',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'zafiratrans/52451',
            'business_owner' => 'Zafira Trans',
            'business_name' => 'Zafira Trans',
            'address' => 'Tegal',
            'email' => 'zafiratrans@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08236369399',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'tmtravel/52451',
            'business_owner' => 'TM Travel',
            'business_name' => 'TM Travel',
            'address' => 'Tegal',
            'email' => 'tmtravel@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08236369392',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);
    }
}
