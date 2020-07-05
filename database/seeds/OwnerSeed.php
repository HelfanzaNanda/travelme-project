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
            'license_number' => 'connext/tegal/12345',
            'business_owner' => 'connext',
            'business_name' => 'Connext Tegal',
            'address' => 'gili tugel',
            'email' => 'connexttegal@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'connext.jpg',
            'telephone' => '089663543355',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'connext/semarang/12345',
            'business_owner' => 'connext',
            'business_name' => 'Connext Semarang',
            'address' => 'jl. gajahmada',
            'email' => 'connextsemarang@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'connext.jpg',
            'telephone' => '089432432123',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Semarang',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'connext/cirebon/12345',
            'business_owner' => 'connext',
            'business_name' => 'Connext Cirebon',
            'address' => 'Jl. mangkukusumo',
            'email' => 'connextcirebon@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'connext.jpg',
            'telephone' => '089442432123',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Cirebon',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'rama sakti/tegal/54321',
            'business_owner' => 'rama sakti',
            'business_name' => 'Rama Sakti Tegal',
            'address' => 'jl. kol sudiarto',
            'email' => 'ramategal@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'rama.jpg',
            'telephone' => '089663543354',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'rama sakti/bandung/54321',
            'business_owner' => 'rama sakti',
            'business_name' => 'Rama Sakti Bandung',
            'address' => 'stasiun bandung',
            'email' => 'ramabandung@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'rama.jpg',
            'telephone' => '089663543369',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Bandung',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'rama sakti/jogja/54321',
            'business_owner' => 'rama sakti',
            'business_name' => 'Rama Sakti Jogja',
            'address' => 'stasiun jogja',
            'email' => 'ramajogja@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'rama.jpg',
            'telephone' => '089663543366',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Jogja',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'rama sakti/semarang/54321',
            'business_owner' => 'rama sakti',
            'business_name' => 'Rama Sakti Semarang',
            'address' => 'stasiun semarang',
            'email' => 'ramasemarang@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'rama.jpg',
            'telephone' => '089163543366',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Semarang',
            'balance' => 0
        ]);


        Owner::create([
            'license_number' => 'Oke Trans/Tegal/12431',
            'business_owner' => 'oke trans',
            'business_name' => 'Oke Trans Tegal',
            'address' => 'tegal',
            'email' => 'oketranstegal@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'oketrans.jpg',
            'telephone' => '089663543353',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'Oke Trans/jakarta/12431',
            'business_owner' => 'oke trans',
            'business_name' => 'Oke Trans Jakarta',
            'address' => 'jakarta',
            'email' => 'oketransjakarta@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'oketrans.jpg',
            'telephone' => '089663543345',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Jakarta',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'Oke Trans/surabaya/12431',
            'business_owner' => 'oke trans',
            'business_name' => 'Oke Trans Surabaya',
            'address' => 'surabaya',
            'email' => 'oketranssurabaya@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'oketrans.jpg',
            'telephone' => '089663543344',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Surabaya',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'andis/tegal/12458',
            'business_owner' => 'andis travel',
            'business_name' => 'andis Tegal',
            'address' => 'Tegal',
            'email' => 'andistegal@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'andis.jpg',
            'telephone' => '08966575454',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'andis/bandung/12453',
            'business_owner' => 'andis travel',
            'business_name' => 'andis Bandung',
            'address' => 'Bandung',
            'email' => 'andisbandung@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'andis.jpg',
            'telephone' => '08966495454',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Bandung',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'daffa/Tegal/52458',
            'business_owner' => 'daffa travel',
            'business_name' => 'daffa Tegal',
            'address' => 'Tegal',
            'email' => 'daffategal@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'daffa.jpg',
            'telephone' => '08986475489',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'daffa/solo/52458',
            'business_owner' => 'daffa travel',
            'business_name' => 'daffa Solo',
            'address' => 'Solo',
            'email' => 'daffasolo@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'daffa.jpg',
            'telephone' => '08986475335',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Solo',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'daffa/jogja/52458',
            'business_owner' => 'daffa travel',
            'business_name' => 'daffa Jogja',
            'address' => 'Jogja',
            'email' => 'daffajogja@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'daffa.jpg',
            'telephone' => '08586475335',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Jogja',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'alvaro/tegal/52458',
            'business_owner' => 'alvaro travel',
            'business_name' => 'alvaro Tegal',
            'address' => 'Tegal',
            'email' => 'alvarotegal@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'alvaro.jpg',
            'telephone' => '08536475335',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'alvaro/semarang/52458',
            'business_owner' => 'alvaro travel',
            'business_name' => 'alvaro Semarang',
            'address' => 'Semarang',
            'email' => 'alvarosemarang@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'alvaro.jpg',
            'telephone' => '08536475395',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Semarang',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'baharitrans/tegal/52451',
            'business_owner' => 'Bahari Trans travel',
            'business_name' => 'Bahari Trans Tegal',
            'address' => 'Tegal',
            'email' => 'baharitranstegal@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'baharitrans.jpg',
            'telephone' => '08536475391',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'baharitrans/jakarta/52451',
            'business_owner' => 'Bahari Trans travel',
            'business_name' => 'Bahari Trans Jakarta',
            'address' => 'Jakarta',
            'email' => 'baharitransjakarta@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'baharitrans.jpg',
            'telephone' => '08536275391',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Jakarta',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'madatrans/tegal/52451',
            'business_owner' => 'Mada Trans travel',
            'business_name' => 'Mada Trans Tegal',
            'address' => 'Tegal',
            'email' => 'madatranstegal@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'madatrans.jpg',
            'telephone' => '08736275391',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'madatrans/jogja/52451',
            'business_owner' => 'Mada Trans travel',
            'business_name' => 'Mada Trans Jogja',
            'address' => 'Jogja',
            'email' => 'madatransjogja@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'madatrans.jpg',
            'telephone' => '08339375391',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Jogja',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'dragonjayaexpress/tegal/52451',
            'business_owner' => 'Dragon Jaya Express travel',
            'business_name' => 'Dragon Jaya Express Tegal',
            'address' => 'Tegal',
            'email' => 'dragonjayaexpresstegal@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'dragonjayaexpress.jpg',
            'telephone' => '08336275390',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'dragonjayaexpress/jakarta/52451',
            'business_owner' => 'Dragon Jaya Express travel',
            'business_name' => 'Dragon Jaya Express Jakarta',
            'address' => 'Jakarta',
            'email' => 'dragonjayaexpressjakarta@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'dragonjayaexpress.jpg',
            'telephone' => '08336275323',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Jakarta',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'dragonjayaexpress/cirebon/52451',
            'business_owner' => 'Dragon Jaya Express travel',
            'business_name' => 'Dragon Jaya Express Cirebon',
            'address' => 'Cirebon',
            'email' => 'dragonjayaexpresscirebon@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'dragonjayaexpress.jpg',
            'telephone' => '08336275321',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Cirebon',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'himatrans/tegal/52451',
            'business_owner' => 'Hima Trans',
            'business_name' => 'Hima Trans Tegal',
            'address' => 'Tegal',
            'email' => 'himatranstegal@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'himatrans.jpg',
            'telephone' => '08236275321',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'himatrans/jogja/52451',
            'business_owner' => 'Hima Trans',
            'business_name' => 'Hima Trans Jogja',
            'address' => 'Jogja',
            'email' => 'himatransjogja@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'himatrans.jpg',
            'telephone' => '08236275311',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Jogja',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'arjunoshuttle/tegal/52451',
            'business_owner' => 'Arjuno Shuttle',
            'business_name' => 'Arjuno Shuttle Tegal',
            'address' => 'Tegal',
            'email' => 'arjunoshuttletegal@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'arjunoshuttle.jpg',
            'telephone' => '08236225311',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'arjunoshuttle/semarang/52451',
            'business_owner' => 'Arjuno Shuttle',
            'business_name' => 'Arjuno Shuttle Semarang',
            'address' => 'Semarang',
            'email' => 'arjunoshuttlesemarang@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'arjunoshuttle.jpg',
            'telephone' => '08236225315',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Semarang',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'alloytravel/cirebon/52451',
            'business_owner' => 'Alloy Travel',
            'business_name' => 'Alloy Travel Cirebon',
            'address' => 'Cirebon',
            'email' => 'alloytravelcirebon@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'alloytravel.jpg',
            'telephone' => '08236265311',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Cirebon',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'alloytravel/bandung/52451',
            'business_owner' => 'Alloy Travel',
            'business_name' => 'Alloy Travel Bandung',
            'address' => 'Bandung',
            'email' => 'alloytravelbandung@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'alloytravel.jpg',
            'telephone' => '08236265319',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Bandung',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'fortunatravel/tegal/52451',
            'business_owner' => 'Fortuna Travel',
            'business_name' => 'Fortuna Travel Tegal',
            'address' => 'Tegal',
            'email' => 'fortunatraveltegal@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'fortunatravel.jpg',
            'telephone' => '08236269319',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'fortunatravel/bandung/52451',
            'business_owner' => 'Fortuna Travel',
            'business_name' => 'Fortuna Travel Bandung',
            'address' => 'Bandung',
            'email' => 'fortunatravelbandung@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'fortunatravel.jpg',
            'telephone' => '08236269399',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Bandung',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'zafiratrans/tegal/52451',
            'business_owner' => 'Zafira Trans',
            'business_name' => 'Zafira Trans Tegal',
            'address' => 'Tegal',
            'email' => 'zafiratranstegal@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'zafiratrans.jpg',
            'telephone' => '08236369399',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'zafiratrans/solo/52451',
            'business_owner' => 'Zafira Trans',
            'business_name' => 'Zafira Trans Solo',
            'address' => 'Solo',
            'email' => 'zafiratranssolo@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'zafiratrans.jpg',
            'telephone' => '08236369391',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Solo',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'tmtravel/tegal/52451',
            'business_owner' => 'TM Travel',
            'business_name' => 'TM Travel Tegal',
            'address' => 'Tegal',
            'email' => 'tmtraveltegal@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'tmtravel.jpg',
            'telephone' => '08236369392',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => 'tmtravel/solo/52451',
            'business_owner' => 'TM Travel',
            'business_name' => 'TM Travel Solo',
            'address' => 'Solo',
            'email' => 'tmtravelsolo@gmail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'tmtravel.jpg',
            'telephone' => '08232319391',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Solo',
            'balance' => 0
        ]);

    }
}
