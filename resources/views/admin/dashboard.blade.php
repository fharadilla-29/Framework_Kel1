@extends('layouts.app')

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <!-- Header -->
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="text-dark" style="font-weight: 700; margin: 0;">Dashboard</h1>
                    <p class="text-muted mt-2">Selamat datang, <strong>{{ $currentUser->name }}</strong> ({{ ucfirst($currentUser->role) }})</p>
                </div>
                <div>
                    <span class="badge" style="background-color: #28a745; padding: 10px 15px; font-size: 14px;">
                        <i class="fas fa-check-circle"></i> {{ now()->format('d M Y H:i') }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Alert Success/Error -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm" style="border: none; border-top: 4px solid #20c997;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1">Total Galeri</p>
                                <h3 class="text-dark" style="font-weight: 700; margin: 0;">{{ $totalGaleri }}</h3>
                            </div>
                            <div style="font-size: 40px; color: #20c997; opacity: 0.2;">
                                <i class="fas fa-images"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm" style="border: none; border-top: 4px solid #17a2b8;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1">Total Berita</p>
                                <h3 class="text-dark" style="font-weight: 700; margin: 0;">{{ $totalBerita }}</h3>
                            </div>
                            <div style="font-size: 40px; color: #17a2b8; opacity: 0.2;">
                                <i class="fas fa-newspaper"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm" style="border: none; border-top: 4px solid #dc3545;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1">Total Agenda</p>
                                <h3 class="text-dark" style="font-weight: 700; margin: 0;">{{ $totalAgenda }}</h3>
                            </div>
                            <div style="font-size: 40px; color: #dc3545; opacity: 0.2;">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Cards -->
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm" style="border: none; cursor: pointer; transition: all 0.3s ease;">
                    <div class="card-body text-center py-5">
                        <div style="font-size: 50px; color: #28a745; margin-bottom: 15px;">
                            <i class="fas fa-images"></i>
                        </div>
                        <h5 class="text-dark" style="font-weight: 700;">Kelola Galeri</h5>
                        <p class="text-muted mb-3">Tambah, edit, atau hapus galeri</p>
                        <a href="{{ route('galeri.index') }}" class="btn text-white" style="background-color: #28a745;">
                            <i class="fas fa-arrow-right"></i> Buka
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm" style="border: none; cursor: pointer; transition: all 0.3s ease;">
                    <div class="card-body text-center py-5">
                        <div style="font-size: 50px; color: #20c997; margin-bottom: 15px;">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <h5 class="text-dark" style="font-weight: 700;">Kelola Berita</h5>
                        <p class="text-muted mb-3">Tambah, edit, atau hapus berita</p>
                        <a href="{{ route('berita.index', 'ekonomi') }}" class="btn text-white" style="background-color: #20c997;">
                            <i class="fas fa-arrow-right"></i> Buka
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm" style="border: none; cursor: pointer; transition: all 0.3s ease;">
                    <div class="card-body text-center py-5">
                        <div style="font-size: 50px; color: #17a2b8; margin-bottom: 15px;">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h5 class="text-dark" style="font-weight: 700;">Kelola Agenda</h5>
                        <p class="text-muted mb-3">Tambah, edit, atau hapus agenda</p>
                        <a href="{{ route('agenda.index') }}" class="btn text-white" style="background-color: #17a2b8;">
                            <i class="fas fa-arrow-right"></i> Buka
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm" style="border: none; cursor: pointer; transition: all 0.3s ease;">
                    <div class="card-body text-center py-5">
                        <div style="font-size: 50px; color: #6f42c1; margin-bottom: 15px;">
                            <i class="fas fa-file-upload"></i>
                        </div>
                        <h5 class="text-dark" style="font-weight: 700;">Manajemen Media</h5>
                        <p class="text-muted mb-3">Upload dan kelola media untuk semua modul</p>
                        <a href="{{ route('media.index') }}" class="btn text-white" style="background-color: #6f42c1;">
                            <i class="fas fa-arrow-right"></i> Buka
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm" style="border: none; cursor: pointer; transition: all 0.3s ease;">
                    <div class="card-body text-center py-5">
                        <div style="font-size: 50px; color: #e83e8c; margin-bottom: 15px;">
                            <i class="fas fa-bars"></i>
                        </div>
                        <h5 class="text-dark" style="font-weight: 700;">Logo & Navbar</h5>
                        <p class="text-muted mb-3">Kelola logo dan media di navbar</p>
                        <a href="{{ route('navbar-media.index') }}" class="btn text-white" style="background-color: #e83e8c;">
                            <i class="fas fa-arrow-right"></i> Buka
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm" style="border: none; cursor: pointer; transition: all 0.3s ease;">
                    <div class="card-body text-center py-5">
                        <div style="font-size: 50px; color: #fd7e14; margin-bottom: 15px;">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <h5 class="text-dark" style="font-weight: 700;">Profil Desa</h5>
                        <p class="text-muted mb-3">Kelola info dan profil desa</p>
                        <a href="{{ route('profil-edit') }}" class="btn text-white" style="background-color: #fd7e14;">
                            <i class="fas fa-arrow-right"></i> Buka
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm" style="border: none; cursor: pointer; transition: all 0.3s ease;">
                    <div class="card-body text-center py-5">
                        <div style="font-size: 50px; color: #6c757d; margin-bottom: 15px;">
                            <i class="fas fa-users"></i>
                        </div>
                        <h5 class="text-dark" style="font-weight: 700;">Kelola Warga</h5>
                        <p class="text-muted mb-3">Tambah, edit, atau hapus data warga</p>
                        <a href="{{ route('warga.index') }}" class="btn text-white" style="background-color: #6c757d;">
                            <i class="fas fa-arrow-right"></i> Buka
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info Box -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="alert" style="background-color: #f0f8ff; border-left: 4px solid #28a745;">
                    <i class="fas fa-info-circle" style="color: #28a745;"></i>
                    <strong style="color: #28a745;">Info:</strong> Anda login sebagai <strong>{{ ucfirst($currentUser->role) }}</strong>. 
                    @if($currentUser->role === 'admin')
                        Anda memiliki akses penuh ke semua fitur admin.
                    @else
                        Anda memiliki akses terbatas. Hubungi admin untuk akses lebih.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
