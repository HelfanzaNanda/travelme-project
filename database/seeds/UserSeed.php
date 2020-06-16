<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'helfanza',
            'email' => 'helfanza@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'telp' => '089663543353',
            'api_token' => 'ini api token helfanza',
            'active' => true,
        ]);

        User::create([
            'name' => 'nanda',
            'email' => 'nanda@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'telp' => '089663543354',
            'api_token' => 'ini api token nanda',
            'active' => true,
        ]);

        User::create([
            'name' => 'alfara',
            'email' => 'alfara@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'telp' => '089663543356',
            'api_token' => 'ini api token alfara',
            'active' => true,
        ]);
    }
}
