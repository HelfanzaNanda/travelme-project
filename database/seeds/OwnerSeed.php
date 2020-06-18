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
            'license_number' => '12345',
            'business_owner' => 'connext alpha',
            'business_name' => 'Connext Tegal',
            'address' => 'gili tugel',
            'email' => 'connexttegal@mail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'connext.jpg',
            'telephone' => '089663543355',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '12346',
            'business_owner' => 'connext alpha',
            'business_name' => 'Connext Jogja',
            'address' => 'kaliurang',
            'email' => 'connextjogja@mail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'connext.jpg',
            'telephone' => '089432432123',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Jogja',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '12342',
            'business_owner' => 'connext alpha',
            'business_name' => 'Connext Bandung',
            'address' => 'cibaduyut',
            'email' => 'connextbandung@mail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'connext.jpg',
            'telephone' => '089432432112',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Bandung',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '54321',
            'business_owner' => 'rama',
            'business_name' => 'Rama Tegal',
            'address' => 'stasiun',
            'email' => 'ramategal@mail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'rama.jpg',
            'telephone' => '089663543354',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '54322',
            'business_owner' => 'rama',
            'business_name' => 'Rama Bandung',
            'address' => 'stasiun bandung',
            'email' => 'ramabandung@mail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'rama.jpg',
            'telephone' => '089663543369',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Bandung',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '54529',
            'business_owner' => 'rama',
            'business_name' => 'Rama Malang',
            'address' => 'stasiun malang',
            'email' => 'ramamalang@mail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'rama.jpg',
            'telephone' => '089663543366',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Malang',
            'balance' => 0
        ]);


        Owner::create([
            'license_number' => '12431',
            'business_owner' => 'oke trans',
            'business_name' => 'Oke Trans Tegal',
            'address' => 'tegal',
            'email' => 'oketranstegal@mail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'oketrans.jpg',
            'telephone' => '089663543353',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '12437',
            'business_owner' => 'oke trans',
            'business_name' => 'Oke Trans Jakarta',
            'address' => 'jakarta',
            'email' => 'oketransjakarta@mail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'oketrans.jpg',
            'telephone' => '089663543345',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Jakarta',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '12487',
            'business_owner' => 'oke trans',
            'business_name' => 'Oke Trans Surabaya',
            'address' => 'surabaya',
            'email' => 'oketranssurabaya@mail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'oketrans.jpg',
            'telephone' => '089663543344',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Surabaya',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '12458',
            'business_owner' => 'andis travel',
            'business_name' => 'andis Tegal',
            'address' => 'Tegal',
            'email' => 'andistegal@mail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'andis.jpg',
            'telephone' => '08966575454',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '12453',
            'business_owner' => 'andis travel',
            'business_name' => 'andis Bandung',
            'address' => 'Bandung',
            'email' => 'andisbandung@mail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'andis.jpg',
            'telephone' => '08966495454',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Bandung',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '52458',
            'business_owner' => 'daffa travel',
            'business_name' => 'daffa Tegal',
            'address' => 'Tegal',
            'email' => 'daffategal@mail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'daffa.jpg',
            'telephone' => '08986475489',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Tegal',
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '82458',
            'business_owner' => 'daffa travel',
            'business_name' => 'daffa Solo',
            'address' => 'Solo',
            'email' => 'daffasolo@mail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'daffa.jpg',
            'telephone' => '08986475335',
            'active' => '2',
            'activation_token' => Str::random(80),
            'domicile' => 'Solo',
            'balance' => 0
        ]);
    }
}
