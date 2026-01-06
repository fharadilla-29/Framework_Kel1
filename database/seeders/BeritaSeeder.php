<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beritas = [
            // Kategori: ekonomi
            [
                'judul' => 'UMKM Lokal Desa Teso Nilo Raih Penghargaan Produk Berkualitas',
                'kategori' => 'ekonomi',
                'konten' => 'Beberapa UMKM di Desa Teso Nilo berhasil memenangkan penghargaan untuk produk-produk unggulan mereka di pameran perdagangan regional. Prestasi ini menunjukkan komitmen masyarakat desa dalam meningkatkan kualitas produk lokal dan membuka peluang ekspor ke pasar yang lebih luas.',
                'tanggal_terbit' => '2025-12-12',
                'gambar' => 'berita/berita-ekonomidesa1.jpg',
            ],
            [
                'judul' => 'Program Pembiayaan Usaha Mikro dengan Bunga Rendah',
                'kategori' => 'ekonomi',
                'konten' => 'Pemerintah Desa bermitra dengan lembaga keuangan untuk memberikan akses pembiayaan usaha mikro dengan bunga yang terjangkau bagi masyarakat. Program ini dirancang untuk mendorong kewirausahaan dan pemberdayaan ekonomi lokal di tingkat desa.',
                'tanggal_terbit' => '2025-12-07',
                'gambar' => 'berita/berita-ekonomidesa2.jpg',
            ],
            [
                'judul' => 'Peningkatan Produksi Pertanian Melalui Teknologi Modern',
                'kategori' => 'ekonomi',
                'konten' => 'Petani lokal desa mendapatkan pelatihan tentang penggunaan teknologi pertanian modern untuk meningkatkan hasil produksi dan efisiensi. Dengan adopsi teknologi irigasi tetes dan budidaya organik, diharapkan produktivitas pertanian Desa Teso Nilo meningkat signifikan.',
                'tanggal_terbit' => '2025-11-30',
                'gambar' => 'berita/berita-ekonomidesa3.jpg',
            ],
            
            // Kategori: pemerintahan
            [
                'judul' => 'Musyawarah Desa Membahas Pembangunan Infrastruktur Tahun 2026',
                'kategori' => 'pemerintahan',
                'konten' => 'Kepala Desa bersama Badan Permusyawaratan Desa (BPD) mengadakan musyawarah untuk membahas rencana pembangunan infrastruktur dan program kerja tahun 2026. Hasil musyawarah akan menjadi pedoman dalam mengalokasikan anggaran desa untuk pembangunan yang lebih baik.',
                'tanggal_terbit' => '2025-12-15',
                'gambar' => 'berita/berita-pemerintahan1.jpg',
            ],
            [
                'judul' => 'Sosialisasi Peraturan Desa Tentang Pengelolaan Sampah',
                'kategori' => 'pemerintahan',
                'konten' => 'Desa Teso Nilo meluncurkan peraturan baru tentang pengelolaan sampah yang ramah lingkungan melalui sosialisasi ke seluruh warga. Peraturan ini bertujuan untuk menjaga kebersihan lingkungan dan menerapkan konsep ekonomi sirkular di tingkat desa.',
                'tanggal_terbit' => '2025-12-08',
                'gambar' => 'berita/berita-pemerintahan2.jpg',
            ],
            [
                'judul' => 'Pengukuhan Kepalaan Adat dan Pemberdayaan Budaya Lokal',
                'kategori' => 'pemerintahan',
                'konten' => 'Pemerintah Desa melakukan acara pengukuhan kepala adat sebagai bagian dari upaya melestarikan dan memberdayakan budaya lokal masyarakat Desa Teso Nilo. Acara ini dihadiri oleh tokoh masyarakat dan dirayakan dengan upacara adat yang meriah.',
                'tanggal_terbit' => '2025-12-01',
                'gambar' => 'berita/berita-pemerintahan3.jpg',
            ],
            
            // Kategori: wisata
            [
                'judul' => 'Pelestarian Hutan Mangrove di Tepi Sungai Indragiri',
                'kategori' => 'wisata',
                'konten' => 'Program pelestarian hutan mangrove dilakukan secara rutin untuk menjaga ekosistem dan mencegah abrasi pantai di kawasan Desa Teso Nilo. Kegiatan penanaman mangrove melibatkan masyarakat lokal dan diharapkan dapat meningkatkan potensi wisata alam desa.',
                'tanggal_terbit' => '2025-12-14',
                'gambar' => 'berita/berita-wisataalam1.jpg',
            ],
            [
                'judul' => 'Pengembangan Kawasan Wisata Alam Gua Batu Berlapis',
                'kategori' => 'wisata',
                'konten' => 'Desa Teso Nilo mengembangkan kawasan wisata alam dengan potensi wisata sejarah dan budaya yang menarik bagi pengunjung dari berbagai daerah. Pengembangan ini mencakup pembangunan akses jalan, fasilitas penunjuk jalan, dan pusat informasi wisata.',
                'tanggal_terbit' => '2025-12-08',
                'gambar' => 'berita/berita-wisataalam2.jpg',
            ],
            [
                'judul' => 'Penjagaan Lingkungan Melalui Kegiatan Kerja Bakti Rutin',
                'kategori' => 'wisata',
                'konten' => 'Masyarakat Desa Teso Nilo secara aktif melakukan kegiatan kerja bakti untuk menjaga kebersihan lingkungan dan kelestarian alam sekitar. Kegiatan ini dilakukan setiap bulan dan melibatkan seluruh lapisan masyarakat desa.',
                'tanggal_terbit' => '2025-12-02',
                'gambar' => 'berita/berita-wisataalam3.jpg',
            ],
            
            // Kategori: kabar-warga
            [
                'judul' => 'Perayaan Hari Jadi Desa Dengan Penuh Kegembiraan',
                'kategori' => 'kabar-warga',
                'konten' => 'Masyarakat Desa Teso Nilo merayakan hari jadi desa dengan berbagai kegiatan seni, budaya, dan olahraga yang melibatkan seluruh warga. Perayaan ini merupakan momen penting untuk mempererat tali silaturahmi dan merayakan kesuksesan bersama selama satu tahun.',
                'tanggal_terbit' => '2025-12-13',
                'gambar' => 'berita/berita-kabarwarga1.jpg',
            ],
            [
                'judul' => 'Program Kesehatan Masyarakat: Pemeriksaan Kesehatan Gratis',
                'kategori' => 'kabar-warga',
                'konten' => 'Puskesmas desa mengadakan program pemeriksaan kesehatan gratis untuk seluruh masyarakat Desa Teso Nilo. Program ini mencakup pemeriksaan tekanan darah, tes diabetes, dan konsultasi kesehatan umum untuk meningkatkan derajat kesehatan masyarakat.',
                'tanggal_terbit' => '2025-12-09',
                'gambar' => 'berita/berita-kabarwarga2.jpg',
            ],
            [
                'judul' => 'Beasiswa Pendidikan untuk Siswa Berprestasi Tinggi',
                'kategori' => 'kabar-warga',
                'konten' => 'Desa Teso Nilo memberikan beasiswa kepada siswa-siswa berprestasi tinggi dari keluarga kurang mampu. Program ini merupakan investasi desa terhadap masa depan generasi muda dan komitmen untuk meningkatkan akses pendidikan berkualitas.',
                'tanggal_terbit' => '2025-12-03',
                'gambar' => 'berita/berita-kabarwarga3.jpg',
            ],
            
            // Kategori: layanan-publik
            [
                'judul' => 'Pelayanan Administrasi Desa Kini Lebih Mudah dengan Sistem Online',
                'kategori' => 'layanan-publik',
                'konten' => 'Desa Teso Nilo meluncurkan sistem layanan administrasi online untuk memudahkan masyarakat dalam mengurus dokumen penting seperti KTP, KK, dan surat keterangan lainnya. Sistem ini dapat diakses kapan saja dan mengurangi waktu antrian di kantor desa.',
                'tanggal_terbit' => '2025-12-11',
                'gambar' => 'berita/berita-layananpublik1.jpg',
            ],
            [
                'judul' => 'Layanan Bantuan Sosial Mulai Disalurkan untuk Keluarga Kurang Mampu',
                'kategori' => 'layanan-publik',
                'konten' => 'Pemerintah Desa mulai menyalurkan bantuan sosial kepada keluarga kurang mampu untuk membantu meringankan beban ekonomi mereka. Bantuan ini diberikan berdasarkan verifikasi data dan transparansi untuk memastikan tepat sasaran.',
                'tanggal_terbit' => '2025-12-06',
                'gambar' => 'berita/berita-layananpublik2.jpg',
            ],
            [
                'judul' => 'Perbaikan Jalan Desa dan Jembatan Penghubung Antar Kampung',
                'kategori' => 'layanan-publik',
                'konten' => 'Desa Teso Nilo melakukan perbaikan infrastruktur jalan dan jembatan untuk meningkatkan aksesibilitas antar kampung dan mendukung kegiatan ekonomi masyarakat. Proyek ini dibiayai dari dana desa dan kerja sama dengan pemerintah kabupaten.',
                'tanggal_terbit' => '2025-11-29',
                'gambar' => 'berita/berita-layananpublik3.jpg',
            ],
        ];

        foreach ($beritas as $berita) {
            Berita::create($berita);
        }
    }
}
