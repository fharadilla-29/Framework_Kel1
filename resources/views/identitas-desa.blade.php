@extends('layouts.app')

@section('content')
<!-- Hero Banner Start -->
<div style="position: relative; width: 100%; max-width: none; margin-left: 0; margin-right: 0; height: 500px; background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('{{ asset('template/img/carousel2.jpg') }}') center/cover no-repeat; display: flex; align-items: center; justify-content: center; margin-bottom: 0;">
    <div style="text-align: center; color: white;">
        <p style="font-size: 1.2rem; margin-bottom: 10px; letter-spacing: 2px;">Profil Desa</p>
        <h1 style="font-size: 3.5rem; font-weight: 700; margin: 0; color: white;">IDENTITAS DESA</h1>
    </div>
</div>
<!-- Hero Banner End -->

<!-- Breadcrumb Start -->
<div class="container-fluid bg-light py-4">
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Identitas Desa</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Content Display Start -->
<div class="container-fluid py-5" style="background-color: #fff;">
    <div class="container py-5">
        <!-- Sejarah Section -->
        <div class="row g-5 mb-5">
            <div class="col-12 wow fadeInUp" data-wow-delay="0.2s">
                <h3 class="text-success mb-4" style="font-weight: 700; font-size: 2rem;">
                    <i class="fas fa-book text-success me-2"></i>Sejarah Singkat Desa
                </h3>
                <div style="width: 60px; height: 4px; background-color: #28a745; margin-bottom: 25px;"></div>
                <div class="p-4" style="background-color: #f9f9f9; border-radius: 8px; border-left: 5px solid #28a745;">
                    <p style="color: #666; line-height: 1.8; font-size: 1rem; text-align: justify; margin: 0;">
                        {{ $profil->sejarah ?? 'Belum ada sejarah singkat desa yang diisi.' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Lokasi Section -->
        <div class="row g-4 mb-5">
            <div class="col-lg-6">
                <div class="card shadow-sm" style="border: none; border-top: 4px solid #20c997;">
                    <div class="card-body">
                        <h5 class="text-success mb-3" style="font-weight: 700;">
                            <i class="fas fa-map text-success me-2"></i>Lokasi Administrasi
                        </h5>
                        <div style="border-top: 2px solid #20c997; padding-top: 15px;">
                            <p class="mb-2"><strong>Nama Desa:</strong> {{ $profil->nama_desa ?? '-' }}</p>
                            <p class="mb-2"><strong>Kecamatan:</strong> {{ $profil->kecamatan ?? '-' }}</p>
                            <p class="mb-2"><strong>Kabupaten:</strong> {{ $profil->kabupaten ?? '-' }}</p>
                            <p class="mb-0"><strong>Provinsi:</strong> {{ $profil->provinsi ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-sm" style="border: none; border-top: 4px solid #ffc107;">
                    <div class="card-body">
                        <h5 class="text-warning mb-3" style="font-weight: 700;">
                            <i class="fas fa-phone text-warning me-2"></i>Alamat & Kontak Kantor
                        </h5>
                        <div style="border-top: 2px solid #ffc107; padding-top: 15px;">
                            <p class="mb-2"><strong>Alamat:</strong></p>
                            <p class="text-break" style="margin-bottom: 15px;">{{ $profil->alamat_kantor ?? '-' }}</p>
                            <p class="mb-2"><strong>Telepon:</strong> {{ $profil->telepon ?? '-' }}</p>
                            <p class="mb-0"><strong>Email:</strong> {{ $profil->email ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Display End -->

@if(Auth::check())
    <!-- ADMIN VIEW - Card CRUD -->
    <div class="container-fluid py-5" style="background-color: #f9f9f9;">
        <div class="container py-5">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h3 class="text-success mb-4" style="font-weight: 700; font-size: 1.8rem;">
                <i class="fas fa-edit text-success me-2"></i>Edit Identitas Desa
            </h3>

            <div class="row g-4">
                <!-- Sejarah Card -->
                <div class="col-lg-12">
                    <div class="card shadow-lg" style="border: none; border-top: 4px solid #28a745;">
                        <div class="card-header" style="background-color: #28a745; color: white; padding: 20px;">
                            <h5 class="mb-0" style="font-weight: 700;">
                                <i class="fas fa-book"></i> Edit Sejarah Singkat Desa
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('profil.update-sejarah') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="sejarah" class="form-label" style="font-weight: 600; color: #28a745;">Sejarah Singkat</label>
                                    <textarea class="form-control @error('sejarah') is-invalid @enderror" 
                                              id="sejarah" name="sejarah" rows="6"
                                              placeholder="Masukkan sejarah singkat desa">{{ old('sejarah', $profil->sejarah ?? '') }}</textarea>
                                    @error('sejarah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn text-white" style="background-color: #28a745; font-weight: 600;">
                                    <i class="fas fa-save"></i> Simpan Sejarah
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Lokasi Card -->
                <div class="col-lg-6">
                    <div class="card shadow-lg" style="border: none; border-top: 4px solid #20c997;">
                        <div class="card-header" style="background-color: #20c997; color: white; padding: 20px;">
                            <h5 class="mb-0" style="font-weight: 700;">
                                <i class="fas fa-map"></i> Edit Lokasi Administrasi
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('profil.update-lokasi') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_desa" class="form-label" style="font-weight: 600;">Nama Desa</label>
                                    <input type="text" class="form-control" id="nama_desa" name="nama_desa" value="{{ old('nama_desa', $profil->nama_desa ?? '') }}" placeholder="Masukkan nama desa">
                                </div>
                                <div class="mb-3">
                                    <label for="kecamatan" class="form-label" style="font-weight: 600;">Kecamatan</label>
                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ old('kecamatan', $profil->kecamatan ?? '') }}" placeholder="Masukkan kecamatan">
                                </div>
                                <div class="mb-3">
                                    <label for="kabupaten" class="form-label" style="font-weight: 600;">Kabupaten</label>
                                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="{{ old('kabupaten', $profil->kabupaten ?? '') }}" placeholder="Masukkan kabupaten">
                                </div>
                                <div class="mb-3">
                                    <label for="provinsi" class="form-label" style="font-weight: 600;">Provinsi</label>
                                    <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ old('provinsi', $profil->provinsi ?? '') }}" placeholder="Masukkan provinsi">
                                </div>
                                <button type="submit" class="btn text-white w-100" style="background-color: #20c997; font-weight: 600;">
                                    <i class="fas fa-save"></i> Simpan Lokasi
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Alamat & Kontak Card -->
                <div class="col-lg-6">
                    <div class="card shadow-lg" style="border: none; border-top: 4px solid #ffc107;">
                        <div class="card-header" style="background-color: #ffc107; color: white; padding: 20px;">
                            <h5 class="mb-0" style="font-weight: 700;">
                                <i class="fas fa-phone"></i> Edit Alamat & Kontak
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('profil.update-kontak') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="alamat_kantor" class="form-label" style="font-weight: 600;">Alamat Kantor</label>
                                    <textarea class="form-control" id="alamat_kantor" name="alamat_kantor" rows="3" placeholder="Masukkan alamat kantor">{{ old('alamat_kantor', $profil->alamat_kantor ?? '') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="telepon" class="form-label" style="font-weight: 600;">Telepon</label>
                                    <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $profil->telepon ?? '') }}" placeholder="Masukkan nomor telepon">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label" style="font-weight: 600;">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $profil->email ?? '') }}" placeholder="Masukkan email">
                                </div>
                                <button type="submit" class="btn text-white w-100" style="background-color: #ffc107; font-weight: 600; color: white !important;">
                                    <i class="fas fa-save"></i> Simpan Kontak
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <!-- GUEST VIEW - Normal Display -->
    <!-- Identitas Content Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <!-- Sejarah Section -->
            <div class="row g-5 mb-5">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.2s">
                    <h3 class="text-success mb-4" style="font-weight: 700; font-size: 2rem;">
                        <i class="fas fa-book text-success me-2"></i>Sejarah Singkat Desa
                    </h3>
                    <div style="width: 60px; height: 4px; background-color: #ffc107; margin-bottom: 25px;"></div>
                    <div class="p-4" style="background-color: #f9f9f9; border-radius: 8px; border-left: 5px solid #28a745;">
                        <p style="text-align: justify; color: #666; line-height: 1.8; font-size: 1.1rem; margin-bottom: 0;">
                            {{ ($profil && $profil->sejarah) ? $profil->sejarah : 'Desa Teso Nilo merupakan salah satu desa dengan sejarah panjang yang kaya akan tradisi dan budaya lokal.' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Kondisi Geografis -->
            <div class="row g-5 mb-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                    <h4 class="text-success mb-3" style="font-weight: 700;">
                        <i class="fas fa-map text-success me-2"></i>Lokasi Administrasi
                    </h4>
                    <div style="width: 50px; height: 3px; background-color: #ffc107; margin-bottom: 20px;"></div>
                    <div class="p-4" style="background-color: #f9f9f9; border-radius: 8px;">
                        <ul style="color: #666; line-height: 2.2;">
                            <li><strong>Nama Desa:</strong> {{ ($profil && $profil->nama_desa) ? $profil->nama_desa : '-' }}</li>
                            <li><strong>Kecamatan:</strong> {{ ($profil && $profil->kecamatan) ? $profil->kecamatan : '-' }}</li>
                            <li><strong>Kabupaten:</strong> {{ ($profil && $profil->kabupaten) ? $profil->kabupaten : '-' }}</li>
                            <li><strong>Provinsi:</strong> {{ ($profil && $profil->provinsi) ? $profil->provinsi : '-' }}</li>
                            <li><strong>Luas Wilayah:</strong> 1.250 Ha</li>
                            <li><strong>Ketinggian:</strong> 50 - 150 m dpl</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                    <h4 class="text-success mb-3" style="font-weight: 700;">
                        <i class="fas fa-phone text-success me-2"></i>Informasi Kontak
                    </h4>
                    <div style="width: 50px; height: 3px; background-color: #ffc107; margin-bottom: 20px;"></div>
                    <div class="p-4" style="background-color: #f9f9f9; border-radius: 8px;">
                        <ul style="color: #666; line-height: 2;">
                            <li><strong>Alamat:</strong> {{ ($profil && $profil->alamat_kantor) ? $profil->alamat_kantor : '-' }}</li>
                            <li><strong>Telepon:</strong> {{ ($profil && $profil->telepon) ? $profil->telepon : '-' }}</li>
                            <li><strong>Email:</strong> {{ ($profil && $profil->email) ? $profil->email : '-' }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Demografi -->
            <div class="row g-5 mb-5">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.2s">
                    <h4 class="text-success mb-3" style="font-weight: 700;">
                        <i class="fas fa-users text-success me-2"></i>Demografi Penduduk
                    </h4>
                    <div style="width: 50px; height: 3px; background-color: #ffc107; margin-bottom: 20px;"></div>
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="p-4 text-center" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); border-radius: 8px; color: white;">
                                <div style="font-size: 2.5rem; font-weight: 700; margin-bottom: 10px;">456</div>
                                <p class="mb-0">Jumlah Penduduk</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                            <div class="p-4 text-center" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); border-radius: 8px; color: white;">
                                <div style="font-size: 2.5rem; font-weight: 700; margin-bottom: 10px;">225</div>
                                <p class="mb-0">Kepala Keluarga</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                            <div class="p-4 text-center" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); border-radius: 8px; color: white;">
                                <div style="font-size: 2.5rem; font-weight: 700; margin-bottom: 10px;">240</div>
                                <p class="mb-0">Laki-Laki</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.8s">
                            <div class="p-4 text-center" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); border-radius: 8px; color: white;">
                                <div style="font-size: 2.5rem; font-weight: 700; margin-bottom: 10px;">216</div>
                                <p class="mb-0">Perempuan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Struktur Organisasi -->
            <div class="row g-5">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.2s">
                    <h4 class="text-success mb-3" style="font-weight: 700;">
                        <i class="fas fa-sitemap text-success me-2"></i>Struktur Organisasi Pemerintah Desa
                    </h4>
                    <div style="width: 50px; height: 3px; background-color: #ffc107; margin-bottom: 20px;"></div>
                    <div class="p-4" style="background-color: #f9f9f9; border-radius: 8px;">
                        <div style="text-align: center; margin-bottom: 20px;">
                            <div style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white; padding: 15px; border-radius: 8px; font-weight: 700; margin-bottom: 15px;">
                                <i class="fas fa-user me-2"></i>Kepala Desa
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div style="background: #e8f5e9; padding: 15px; border-radius: 8px; border-left: 4px solid #28a745; text-align: center;">
                                    <h6 style="color: #28a745; font-weight: 700;">Sekretaris Desa</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="background: #e8f5e9; padding: 15px; border-radius: 8px; border-left: 4px solid #28a745; text-align: center;">
                                    <h6 style="color: #28a745; font-weight: 700;">Bendahara Desa</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="background: #e8f5e9; padding: 15px; border-radius: 8px; border-left: 4px solid #28a745; text-align: center;">
                                    <h6 style="color: #28a745; font-weight: 700;">Kepala Dusun</h6>
                                </div>
                            </div>
                        </div>
                        <p style="color: #666; text-align: center; margin-top: 20px; font-size: 0.9rem;">
                            Struktur organisasi pemerintah desa disusun untuk memastikan pelayanan publik yang efektif dan efisien kepada masyarakat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Identitas Content End -->
@endif
@endsection
