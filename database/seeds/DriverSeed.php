<?php

use App\Driver;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DriverSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Driver::create([
            'owner_id' => 1,
            'car_id' => 1,
            'nik' => '1234567890123456',
            'sim' => '123456789012',
            'name' => 'gilang',
            'gender' => 'm',
            'email' => 'gilang@gmail.com',
            'password' => Hash::make('089663543354'),
            'avatar' => 'gilang.jpg',
            'address' => 'poso tegal',
            'telephone' => '089663543354',
            'api_token' => 'ini api token gilang',
            'active' => true,
            'is_tegal' => true
        ]);

        Driver::create([
            'owner_id' => 2,
            'car_id' => 3,
            'nik' => '1234567890123455',
            'sim' => '123456789013',
            'name' => 'pardi',
            'gender' => 'm',
            'email' => 'pardi@gmail.com',
            'password' => Hash::make('089663543355'),
            'avatar' => 'pardi.jpg',
            'address' => 'poso tegal',
            'telephone' => '089663543355',
            'api_token' => 'ini api token pardi',
            'active' => true,
            'is_tegal' => true
        ]);

        Driver::create([
            'owner_id' => 3,
            'car_id' => 5,
            'nik' => '1234567890123451',
            'sim' => '123456789011',
            'name' => 'hendi',
            'gender' => 'm',
            'email' => 'hendi@gmail.com',
            'password' => Hash::make('089663543359'),
            'avatar' => 'hendi.jpg',
            'address' => 'poso tegal',
            'telephone' => '089663543359',
            'api_token' => 'ini api token hendi',
            'active' => true,
            'is_tegal' => true
        ]);
    }
}
