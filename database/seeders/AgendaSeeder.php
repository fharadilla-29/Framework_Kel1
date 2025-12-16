<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Agenda;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agenda::create([
            'judul' => 'Musyawarah Perencanaan Pembangunan Desa (Musrenbang)',
            'deskripsi' => 'Musyawarah untuk merencanakan pembangunan desa tahun depan. Melibatkan semua stakeholder desa dalam proses perencanaan pembangunan infrastruktur dan program sosial kemasyarakatan.',
            'lokasi' => 'Balai Desa Teso Nilo',
            'tanggal' => '2025-12-20',
            'waktu_mulai' => '08:00',
            'waktu_selesai' => '12:00',
            'penyelenggara' => 'Pemerintah Desa'
        ]);

        Agenda::create([
            'judul' => 'Pelatihan Keterampilan UMKM untuk Ibu Rumah Tangga',
            'deskripsi' => 'Program pelatihan keterampilan membuat kerajinan tangan dan produk olahan untuk meningkatkan pendapatan keluarga. Pelatihan ini diberikan oleh narasumber berpengalaman dari Dinas Koperasi dan UMKM.',
            'lokasi' => 'Rumah Pertemuan Dusun I',
            'tanggal' => '2025-12-22',
            'waktu_mulai' => '09:00',
            'waktu_selesai' => '14:00',
            'penyelenggara' => 'Dinas Koperasi & UMKM'
        ]);

        Agenda::create([
            'judul' => 'Pelayanan Kesehatan Gratis dan Pemeriksaan Posyandu',
            'deskripsi' => 'Program pemeriksaan kesehatan gratis untuk ibu hamil, bayi, anak-anak, dan lansia dengan pemeriksaan lengkap termasuk vaksinasi, penimbangan, dan konsultasi kesehatan dengan tenaga medis profesional.',
            'lokasi' => 'Puskesmas Teso Nilo',
            'tanggal' => '2025-12-25',
            'waktu_mulai' => '08:00',
            'waktu_selesai' => '13:00',
            'penyelenggara' => 'Puskesmas & Desa'
        ]);
    }
}
