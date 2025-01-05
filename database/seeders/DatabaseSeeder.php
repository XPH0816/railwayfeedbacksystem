<?php

namespace Database\Seeders;

use App\Models\Railway;
use App\Models\Station;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        $railways = [
            'Kelana Jaya Line',
            'Ampang Line',
            'Sri Petaling Line',
            'Kajang Line',
        ];

        $stations = [
            'Kelana Jaya Line' => [
                'Putra Heights',
                'Subang Jaya',
                'Ara Damansara',
                'Glenmarie',
                'Kelana Jaya',
                'Taman Bahagia',
                'Taman Paramount',
                'Asia Jaya',
                'Taman Jaya',
                'University',
                'Sri Rampai',
                'Wangsa Maju',
                'Taman Melati',
                'Terminal Putra',
            ],
            'Ampang Line' => [
                'Sentul Timur',
                'Sentul',
                'Titiwangsa',
                'PWTC',
                'Hang Tuah',
                'Plaza Rakyat',
                'Masjid Jamek',
                'Bandaraya',
                'Sultan Ismail',
                'PWTC',
            ],
            'Sri Petaling Line' => [
                'Putra Heights',
                'Alam Megah',
                'USJ 21',
                'Wawasan',
                'SS 18',
                'Subang Jaya',
                'SS 15',
                'SS 18',
                'USJ 7',
                'Taipan',
                'Wawasan',
                'USJ 21',
                'Alam Megah',
                'Subang Alam',
                'Putra Heights',
            ],
            'Kajang Line' => [
                'Sungai Buloh',
                'Kampung Selamat',
                'Kwasa Damansara',
                'Kwasa Sentral',
                'Kota Damansara',
                'Surian',
                'Mutiara Damansara',
                'Bandar Utama',
                'TTDI',
                'Phileo Damansara',
                'Pusat Bandar Damansara',
                'Semantan',
                'Muzium Negara',
                'Pasar Seni',
                'Merdeka',
                'Bukit Bintang',
                'Tun Razak Exchange',
                'Cochrane',
                'Maluri',
                'Taman Pertama',
                'Taman Midah',
                'Taman Mutiara',
                'Taman Connaught',
                'Taman Suntex',
                'Sri Raya',
                'Bandar Tun Hussein Onn',
                'Batu 11 Cheras',
                'Bukit Dukung',
                'Sungai Jernih',
                'Stadium Kajang',
                'Kajang',
            ],
        ];

        foreach ($railways as $railway) {
            $data = Railway::create([
                'name' => $railway,
                'status' => 'active',
            ]);

            foreach ($stations[$railway] as $station) {
                Station::create([
                    'name' => $station,
                    'railway_id' => $data->id,
                ]);
            }
        }

    }
}
