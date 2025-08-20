<?php

namespace Database\Seeders;

use App\Models\Statistik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatistikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Statistik::updateOrInsert(
            ['id' => 1],
            [
                'jml_penduduk' => 0,
                'pembangunan' => 0,
                'jml_rumah' => 0,
                'jml_pria' => 0,
                'jml_wanita' => 0,
                'jml_kepala_keluarga' => 0,
                'jml_kk' => 0,
                'pembangunan' => 0,
            ]
        );
    }
}
