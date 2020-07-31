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
            'license_number' => '556/022/DUP/V/2018',
            'business_owner' => 'IGA RINADI',
            'business_name' => 'Connext Shuttle',
            'address' => 'Jl. Jendral Sudirman No. 29 Randugunting Kec. Tegal Selatan',
            'email' => 'connextshuttle@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => ' 08170888666',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '556/024/DUP/VII/2018',
            'business_owner' => 'CHANIF AHMAD SANAD',
            'business_name' => 'Rama Sakti',
            'address' => 'Jl. Kol. Sudiarto (Komplek Ruko Dwica Square BLOK A9),Panggung, Kec. Tegal Tim., Kota Tegal,',
            'email' => 'ramasakti@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08283351639',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '556/025/DUP/VII/2018',
            'business_owner' => 'PONTJODIJONO',
            'business_name' => 'Oke Trans',
            'address' => 'Jl. Merpati Pekauman Tegal Barat Tegal',
            'email' => 'oketrans@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '089663543353',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '556/030/DUP/VIII/2018',
            'business_owner' => 'SAPTO BIMANTORO',
            'business_name' => 'andis Travel',
            'address' => 'Jl. S Parman No 7 Tegal',
            'email' => 'andistravel@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08283322788',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '556/026/DUP/VII/2018',
            'business_owner' => 'KAMSURI',
            'business_name' => 'daffa Travel',
            'address' => 'Jl. Kolonel Sugiono No.7, Pekauman, Kec. Tegal Barat, Kota Tegal',
            'email' => 'daffatravel@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '087830101963',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);


        Owner::create([
            'license_number' => '556/027/DUP/VII/2018',
            'business_owner' => 'GITA SETIAWATI',
            'business_name' => 'Bahari Trans Travel',
            'address' => 'Jl. Bekasi No.13, Krandon, Kec. Margadana, Kota Tegal',
            'email' => 'baharitranstravel@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08283874008',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);


        Owner::create([
            'license_number' => 'alvaro/52458',
            'business_owner' => 'DANIS PUNTOADI',
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
            'license_number' => '556/028/DUP/VII/2018',
            'business_owner' => 'EKO ANDIYANTO',
            'business_name' => 'Mada Trans Travel',
            'address' => 'Jl. Dr. Sudiro Husada No.76, Pesurungan Lor, Margadana, Tegal',
            'email' => 'madatranstravel@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '081328023389',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '556/031/DUP/VIII/2018',
            'business_owner' => 'AIRLANGGA ENJIASA',
            'business_name' => 'Dragon Jaya Express Travel',
            'address' => 'Jl. Kapten Sudibyo No.6, Pekauman, Kec. Tegal Barat, Kota Tegal',
            'email' => 'dragonjayaexpresstravel@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08283353514',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '556/032/DUP/VIII/2018',
            'business_owner' => 'AGOES TANTONO HIENDOKO',
            'business_name' => 'Hima Trans',
            'address' => 'Jl. Teuku Umar No.91, Debong Tengah, Kec. Tegal Selatan., Kota Tegal,',
            'email' => 'himatrans@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '085600001657',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '556/033/DUP/VIII/2018',
            'business_owner' => 'AGOES TANTONO HIENDOKO',
            'business_name' => 'Arjuno Shuttle',
            'address' => 'Jl. P. Diponegoro No.28A, Pekauman, Kec. Tegal Barat, Kota Tegal',
            'email' => 'arjunoshuttle@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08111232011',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '556/002/DUP/VII/2019',
            'business_owner' => 'SUMARNO NGADIMAN',
            'business_name' => 'Alloy Travel',
            'address' => 'Jl. Kapten Sudibyo No.44, Randugunting, Kec. Tegal Sel., Kota Tegal',
            'email' => 'alloytravel@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => ' 08112790111',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '556/017/DUP/XII/2019',
            'business_owner' => 'M. WARIS',
            'business_name' => 'Fortuna Travel',
            'address' => 'Jl. Diponegoro No.107, Mangkukusuman, Kec. Tegal Timur, Kota Tegal',
            'email' => 'fortunatravel@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '08283351639',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '556/009/DUP/IX/2019',
            'business_owner' => 'IKTA WAHYU WIDODO',
            'business_name' => 'Zafira Trans',
            'address' => 'Tegalx`',
            'email' => 'zafiratrans@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '    ',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);

        Owner::create([
            'license_number' => '556/004/DUP/VII/2019',
            'business_owner' => 'HADI SUSYANTO',
            'business_name' => 'TM Travel',
            'address' => 'Jl. Masjid, Mangkukusuman, Kec. Tegal Tim., Kota Tegal',
            'email' => 'tmtravel@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '085326461056',
            'active' => '2',
            'activation_token' => Str::random(80),
            'balance' => 0
        ]);
    }
}
