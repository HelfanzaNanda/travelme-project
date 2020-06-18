<?php

use App\Departure;
use Illuminate\Database\Seeder;

class DepartureSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //form tegal to bandung, jogja
        Departure::create([
            'owner_id' => 1,
            'from' => 'Tegal',
            'destination' => 'Jogja',
            'logo' => 'Jogja.jpg',
            'price' => 70000,
        ]);
        Departure::create([
            'owner_id' => 1,
            'from' => 'Tegal',
            'destination' => 'Bandung',
            'logo' => 'Bandung.jpg',
            'price' => 90000,
        ]);

        //form jogja to tegal, jogja
        Departure::create([
            'owner_id' => 2,
            'from' => 'Jogja',
            'destination' => 'Tegal',
            'logo' => 'Jogja.jpg',
            'price' => 70000,
        ]);
        Departure::create([
            'owner_id' => 2,
            'from' => 'Jogja',
            'destination' => 'Bandung',
            'logo' => 'Jogja.jpg',
            'price' => 90000,
        ]);

        //form bandung to tegal, jogja
        Departure::create([
            'owner_id' => 3,
            'from' => 'Bandung',
            'destination' => 'Tegal',
            'logo' => 'Bandung.jpg',
            'price' => 70000,
        ]);
        Departure::create([
            'owner_id' => 3,
            'from' => 'Bandung',
            'destination' => 'Jogja',
            'logo' => 'Bandung.jpg',
            'price' => 90000,
        ]);

        //form tegal to bandung, malang
        Departure::create([
            'owner_id' => 4,
            'from' => 'Tegal',
            'destination' => 'Bandung',
            'logo' => 'Bandung.jpg',
            'price' => 70000,
        ]);
        Departure::create([
            'owner_id' => 4,
            'from' => 'Tegal',
            'destination' => 'Malang',
            'logo' => 'Malang.jpg',
            'price' => 90000,
        ]);

        //form bandung to tegal, malang
        Departure::create([
            'owner_id' => 5,
            'from' => 'Bandung',
            'destination' => 'Tegal',
            'logo' => 'Bandung.jpg',
            'price' => 70000,
        ]);
        Departure::create([
            'owner_id' => 5,
            'from' => 'Bandung',
            'destination' => 'Malang',
            'logo' => 'Bandung.jpg',
            'price' => 100000,
        ]);

        //form malang to tegal, bandung
        Departure::create([
            'owner_id' => 6,
            'from' => 'Malang',
            'destination' => 'Tegal',
            'logo' => 'Malang.jpg',
            'price' => 80000,
        ]);

        Departure::create([
            'owner_id' => 6,
            'from' => 'Malang',
            'destination' => 'Bandung',
            'logo' => 'Malang.jpg',
            'price' => 100000,
        ]);

        //from tegal to jakarta, surabaya
        Departure::create([
            'owner_id' => 7,
            'from' => 'Tegal',
            'destination' => 'Jakarta',
            'logo' => 'Jakarta.jpg',
            'price' => 80000,
        ]);

        Departure::create([
            'owner_id' => 7,
            'from' => 'Tegal',
            'destination' => 'Surabaya',
            'logo' => 'Surabaya.jpg',
            'price' => 90000,
        ]);
        
        //from jakarta to tegal, surabaya
        Departure::create([
            'owner_id' => 8,
            'from' => 'Jakata',
            'destination' => 'Tegal',
            'logo' => 'Jakarta.jpg',
            'price' => 80000,
        ]);

        Departure::create([
            'owner_id' => 8,
            'from' => 'Jakata',
            'destination' => 'Surabaya',
            'logo' => 'Jakarta.jpg',
            'price' => 110000,
        ]);

        //from surabaya to tegal, jakarta
        Departure::create([
            'owner_id' => 9,
            'from' => 'Surabaya',
            'destination' => 'Tegal',
            'logo' => 'Surabaya.jpg',
            'price' => 90000,
        ]);

        Departure::create([
            'owner_id' => 9,
            'from' => 'Surabaya',
            'destination' => 'Jakarta',
            'logo' => 'Surabaya.jpg',
            'price' => 110000,
        ]);

        //from tegal to bandung
        Departure::create([
            'owner_id' => 10,
            'from' => 'Tegal',
            'destination' => 'Bandung',
            'logo' => 'Bandung.jpg',
            'price' => 90000,
        ]);

        //from tegal to bandung
        Departure::create([
            'owner_id' => 11,
            'from' => 'Bandung',
            'destination' => 'Tegal',
            'logo' => 'Bandung.jpg',
            'price' => 90000,
        ]);

        //from tegal to solo
        Departure::create([
            'owner_id' => 12,
            'from' => 'Tegal',
            'destination' => 'Solo',
            'logo' => 'Solo.jpg',
            'price' => 90000,
        ]);

        //from solo to solo
        Departure::create([
            'owner_id' => 13,
            'from' => 'Solo',
            'destination' => 'Tegal',
            'logo' => 'Solo.jpg',
            'price' => 90000,
        ]);

    }
}
