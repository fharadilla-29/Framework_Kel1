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
                'no_ktp' => '3209011234567890',
                'nama' => 'Budi Santoso',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'pekerjaan' => 'Petani',
                'telp' => '081234567890',
                'email' => 'budi.santoso@example.com',
            ],
            [
                'no_ktp' => '3209019876543210',
                'nama' => 'Siti Nurhaliza',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'pekerjaan' => 'Guru',
                'telp' => '082345678901',
                'email' => 'siti.nurhaliza@example.com',
            ],
            [
                'no_ktp' => '3209014567890123',
                'nama' => 'Ahmad Wijaya',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'pekerjaan' => 'Karyawan Swasta',
                'telp' => '083456789012',
                'email' => 'ahmad.wijaya@example.com',
            ],
            [
                'no_ktp' => '3209012345678901',
                'nama' => 'Dewi Kartini',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Kristen',
                'pekerjaan' => 'Ibu Rumah Tangga',
                'telp' => '084567890123',
                'email' => 'dewi.kartini@example.com',
            ],
            [
                'no_ktp' => '3209015678901234',
                'nama' => 'Rudi Gunawan',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'pekerjaan' => 'Pedagang',
                'telp' => '085678901234',
                'email' => 'rudi.gunawan@example.com',
            ],
            [
                'no_ktp' => '3209016789012345',
                'nama' => 'Ani Suryani',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Buddha',
                'pekerjaan' => 'Perawat',
                'telp' => '086789012345',
                'email' => 'ani.suryani@example.com',
            ],
            [
                'no_ktp' => '3209017890123456',
                'nama' => 'Hendra Kusuma',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'pekerjaan' => 'Supir',
                'telp' => '087890123456',
                'email' => 'hendra.kusuma@example.com',
            ],
            [
                'no_ktp' => '3209018901234567',
                'nama' => 'Eka Putri',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Hindu',
                'pekerjaan' => 'Staf Administrasi',
                'telp' => '088901234567',
                'email' => 'eka.putri@example.com',
            ],
            [
                'no_ktp' => '3209013456789012',
                'nama' => 'Bambang Irawan',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Kristen',
                'pekerjaan' => 'Tukang Kayu',
                'telp' => '089012345678',
                'email' => 'bambang.irawan@example.com',
            ],
            [
                'no_ktp' => '3209011357924680',
                'nama' => 'Linda Sari',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'pekerjaan' => 'Penjual Sayur',
                'telp' => '080123456789',
                'email' => 'linda.sari@example.com',
            ],
            [
                'no_ktp' => '3209012468013579',
                'nama' => 'Joko Supriyanto',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'pekerjaan' => 'Petani',
                'telp' => '081357924680',
                'email' => 'joko.supriyanto@example.com',
            ],
            [
                'no_ktp' => '3209013579024680',
                'nama' => 'Ratna Wijaya',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Katolik',
                'pekerjaan' => 'Guru TK',
                'telp' => '082468013579',
                'email' => 'ratna.wijaya@example.com',
            ],
        ];

        foreach ($wargas as $warga) {
            Warga::create($warga);
        }
    }
}
