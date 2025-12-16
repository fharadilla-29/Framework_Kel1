@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid bg-light py-4">
    <div class="container py-4">
        <h1 class="display-4 text-success mb-3">Sejarah Desa</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Sejarah</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Sejarah Content Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="text-success mb-3" style="font-weight: 700; font-size: 2.5rem;">Sejarah</h2>
            <div style="width: 120px; height: 4px; background-color: #ffc107; margin: 20px auto;"></div>
        </div>

        <div class="row g-5 align-items-center">
            <!-- Gambar -->
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <img src="{{ asset('img/blog-1.jpg') }}" class="img-fluid rounded" style="width: 100%; height: 400px; object-fit: cover;" alt="Sejarah Desa">
            </div>

            <!-- Konten -->
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                <h3 class="text-success mb-4" style="font-weight: 700; font-size: 1.8rem;">Perjalanan Desa Teso Nilo</h3>
                <p style="color: #666; line-height: 1.8; margin-bottom: 15px; text-align: justify;">
                    Desa Teso Nilo memiliki sejarah yang panjang dan kaya dengan warisan budaya lokal. Desa ini terletak di Kabupaten yang indah dengan pemandangan alam yang menakjubkan. Sejak dahulu, masyarakat Desa Teso Nilo dikenal sebagai petani yang tekun dan memiliki semangat gotong royong yang kuat.
                </p>
                <p style="color: #666; line-height: 1.8; margin-bottom: 15px; text-align: justify;">
                    Perkembangan Desa Teso Nilo dimulai dari kelompok-kelompok kecil masyarakat yang tinggal di tepi hutan dan sungai. Mereka menjalankan kehidupan sederhana dengan mengandalkan hasil pertanian dan hasil hutan. Seiring dengan berjalannya waktu, desa ini terus berkembang dan semakin maju dengan masuknya teknologi modern.
                </p>
                <p style="color: #666; line-height: 1.8; text-align: justify;">
                    Pada era digital ini, Desa Teso Nilo terus berusaha mempertahankan nilai-nilai tradisional sambil mengadopsi inovasi teknologi. Masyarakat tetap menjaga kelestarian lingkungan dan budaya lokal yang menjadi identitas desa. Semangat kebersamaan dan gotong royong tetap menjadi fondasi kuat dalam membangun desa yang maju dan berkelanjutan.
                </p>
            </div>
        </div>

        <!-- Timeline Section -->
        <div class="row mt-5 pt-5">
            <div class="col-12">
                <h3 class="text-success mb-5 text-center" style="font-weight: 700; font-size: 1.8rem;">Tonggak Perkembangan Desa</h3>
            </div>
        </div>

        <div class="row g-4">
            <!-- Timeline 1 -->
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                <div style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); padding: 30px; border-radius: 8px; color: white; text-align: center; min-height: 200px; display: flex; flex-direction: column; justify-content: center;">
                    <h5 style="font-weight: 700; margin-bottom: 15px; font-size: 1.5rem;">1950-an</h5>
                    <p style="margin: 0; line-height: 1.6;">Pembentukan masyarakat awal dan pemukiman tetap di lokasi saat ini</p>
                </div>
            </div>

            <!-- Timeline 2 -->
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                <div style="background: #f9f9f9; padding: 30px; border-radius: 8px; border-left: 4px solid #28a745; color: #333; text-align: center; min-height: 200px; display: flex; flex-direction: column; justify-content: center;">
                    <h5 style="font-weight: 700; margin-bottom: 15px; font-size: 1.5rem; color: #28a745;">1980-an</h5>
                    <p style="margin: 0; line-height: 1.6;">Pembangunan infrastruktur dasar seperti sekolah dan jalan penghubung antar dusun</p>
                </div>
            </div>

            <!-- Timeline 3 -->
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                <div style="background: #f9f9f9; padding: 30px; border-radius: 8px; border-left: 4px solid #28a745; color: #333; text-align: center; min-height: 200px; display: flex; flex-direction: column; justify-content: center;">
                    <h5 style="font-weight: 700; margin-bottom: 15px; font-size: 1.5rem; color: #28a745;">2000-an</h5>
                    <p style="margin: 0; line-height: 1.6;">Peningkatan akses listrik dan air bersih untuk seluruh masyarakat desa</p>
                </div>
            </div>

            <!-- Timeline 4 -->
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                <div style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); padding: 30px; border-radius: 8px; color: white; text-align: center; min-height: 200px; display: flex; flex-direction: column; justify-content: center;">
                    <h5 style="font-weight: 700; margin-bottom: 15px; font-size: 1.5rem;">Sekarang</h5>
                    <p style="margin: 0; line-height: 1.6;">Transformasi digital dan pembangunan berkelanjutan untuk masa depan lebih baik</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sejarah Content End -->
@endsection
