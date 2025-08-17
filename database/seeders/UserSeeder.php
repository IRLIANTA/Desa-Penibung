<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          User::create ([
            'email' => 'admindesapenibung@gmail.com',
            'name' => 'Admin Desa Penibung',
            'password' => Hash::make('passwordadmin123'),
        ]);

    }
}
