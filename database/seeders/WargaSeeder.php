<?php

namespace Database\Seeders;

use App\Models\Warga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wargas = [
            [
                'no_ktp' => '3201012001010001',
                'nama' => 'Ahmad Fauzi',
                'jenis_kelamin' => 'L',
                'agama' => 'Islam',
                'pekerjaan' => 'Petani',
                'telp' => '081234567890',
                'email' => 'ahmad.fauzi@example.com',
            ],
            [
                'no_ktp' => '3201012001010002',
                'nama' => 'Siti Nurhaliza',
                'jenis_kelamin' => 'P',
                'agama' => 'Islam',
                'pekerjaan' => 'Ibu Rumah Tangga',
                'telp' => '081234567891',
                'email' => 'siti.nurhaliza@example.com',
            ],
            [
                'no_ktp' => '3201012001010003',
                'nama' => 'Budi Santoso',
                'jenis_kelamin' => 'L',
                'agama' => 'Kristen',
                'pekerjaan' => 'Wiraswasta',
                'telp' => '081234567892',
                'email' => 'budi.santoso@example.com',
            ],
            [
                'no_ktp' => '3201012001010004',
                'nama' => 'Dewi Lestari',
                'jenis_kelamin' => 'P',
                'agama' => 'Hindu',
                'pekerjaan' => 'Guru',
                'telp' => '081234567893',
                'email' => 'dewi.lestari@example.com',
            ],
            [
                'no_ktp' => '3201012001010005',
                'nama' => 'Eko Prasetyo',
                'jenis_kelamin' => 'L',
                'agama' => 'Buddha',
                'pekerjaan' => 'PNS',
                'telp' => '081234567894',
                'email' => 'eko.prasetyo@example.com',
            ],
        ];

        foreach ($wargas as $warga) {
            Warga::create($warga);
        }
    }
}
