<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          Profile::updateOrInsert(
            ['id' => 1], 
            [
                'desa_name' => 'Desa Penibung',
                'location' => 'Kec. Mempawah Hilir, Kab. Mempawah, Prov. Kalimantan Barat, Indonesia',
                'kepala_desa_name' => 'Evi Junita S.Pd.I',
                'kepala_desa_profil' => null,
                'luas_petanian' => '25.200',
                'luas_area' => '9.222.500',
                'tgl_desa_dibangun' => '24 Feb 2012',
                'description' => 'Desa Angga Countryside terletak di kaki gunung 🏔️ dengan udara sejuk dan pemandangan sawah yang hijau 🌿. Warganya ramah dan masih menjaga tradisi gotong-royong. Penghasilan utama desa ini adalah padi 🍚, kopi ☕, dan kerajinan anyaman bambu 🎋. Desa ini juga memiliki wisata alam seperti air terjun kecil 💧 dan jalur tracking.',
            ]
        );
    }
}
