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
          Statistik::create ([
            'jml_penduduk' => 0,
            'pembangunan' => 0,
            'jml_rumah' => 0,
        ]);
    }
}
