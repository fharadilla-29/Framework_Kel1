<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@binadeah.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Create Petugas User
        User::create([
            'name' => 'Petugas Desa',
            'email' => 'petugas@binadeah.com',
            'password' => Hash::make('petugas123'),
            'role' => 'petugas',
        ]);

        // Create Regular User
        User::create([
            'name' => 'Penduduk Desa',
            'email' => 'warga@binadeah.com',
            'password' => Hash::make('warga123'),
            'role' => 'warga',
        ]);
    }
}
