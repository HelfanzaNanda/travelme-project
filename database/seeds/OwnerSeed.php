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
            'business_name' => 'connext tegal',
            'address' => 'gili tugel',
            'email' => 'connext@mail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'connext.jpg',
            'telephone' => '089663543355',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '54321',
            'business_owner' => 'rama',
            'business_name' => 'Rama Tegal',
            'address' => 'stasiun',
            'email' => 'ramategal@mail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'rama_tegal.jpg',
            'telephone' => '089663543354',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);


        Owner::create([
            'license_number' => '12431',
            'business_owner' => 'oke trans',
            'business_name' => 'Oke Trans',
            'address' => 'tegal',
            'email' => 'oketrans@mail.com',
            'password' => Hash::make('12345678'),
            'photo' => 'oketrans.jpg',
            'telephone' => '089663543353',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);
    }
}
