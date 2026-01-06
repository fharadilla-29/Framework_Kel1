@extends('layouts.app')

@section('content')
<!-- Hero Banner Start -->
<div style="position: relative; width: 100%; max-width: none; margin-left: 0; margin-right: 0; height: 500px; background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('{{ asset('template/img/banner-3.jpg') }}') center/cover no-repeat; display: flex; align-items: center; justify-content: center; margin-bottom: 0;">
    <div style="text-align: center; color: white;">
        <p style="font-size: 1.2rem; margin-bottom: 10px; letter-spacing: 2px;">Hubungi Kami</p>
        <h1 style="font-size: 3.5rem; font-weight: 700; margin: 0; color: white;">KONTAK KANTOR</h1>
    </div>
</div>
<!-- Hero Banner End -->

<!-- Breadcrumb Start -->
<div class="container-fluid bg-light py-4">
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Kontak Kantor</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Contact Content Display Start -->
<div class="container-fluid py-5" style="background-color: #fff;">
    <div class="container py-5">
        <h3 class="text-success mb-4" style="font-weight: 700; font-size: 2rem;">
            <i class="fas fa-phone text-success me-2"></i>Informasi Kontak Kantor Desa
        </h3>
        <div style="width: 60px; height: 4px; background-color: #28a745; margin-bottom: 30px;"></div>

        <div class="row g-4">
            <!-- Alamat Kantor -->
            <div class="col-lg-4">
                <div class="card shadow-sm" style="border: none; border-top: 4px solid #28a745;">
                    <div class="card-body">
                        <h5 class="text-success mb-3" style="font-weight: 700;">
                            <i class="fas fa-map-marker-alt text-success me-2"></i>Alamat Kantor
                        </h5>
                        <div style="border-top: 2px solid #28a745; padding-top: 15px;">
                            <p class="text-break" style="color: #666; line-height: 1.8; margin: 0;">
                                {{ ($profil && $profil->alamat_kantor) ? $profil->alamat_kantor : 'Belum ada alamat kantor yang diisi.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Telepon -->
            <div class="col-lg-4">
                <div class="card shadow-sm" style="border: none; border-top: 4px solid #20c997;">
                    <div class="card-body">
                        <h5 class="text-success mb-3" style="font-weight: 700;">
                            <i class="fas fa-phone text-success me-2"></i>Nomor Telepon
                        </h5>
                        <div style="border-top: 2px solid #20c997; padding-top: 15px;">
                            <p style="color: #666; line-height: 1.8; margin: 0; font-size: 1.1rem;">
                                <a href="tel:{{ ($profil && $profil->telepon) ? $profil->telepon : '#' }}" style="color: #28a745; text-decoration: none;">
                                    {{ ($profil && $profil->telepon) ? $profil->telepon : 'Belum ada nomor telepon yang diisi.' }}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="col-lg-4">
                <div class="card shadow-sm" style="border: none; border-top: 4px solid #ffc107;">
                    <div class="card-body">
                        <h5 class="text-warning mb-3" style="font-weight: 700;">
                            <i class="fas fa-envelope text-warning me-2"></i>Email
                        </h5>
                        <div style="border-top: 2px solid #ffc107; padding-top: 15px;">
                            <p style="color: #666; line-height: 1.8; margin: 0; word-break: break-all;">
                                @if($profil && $profil->email)
                                    <a href="mailto:{{ $profil->email }}" style="color: #28a745; text-decoration: none;">
                                        {{ $profil->email }}
                                    </a>
                                @else
                                    Belum ada email yang diisi.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Content Display End -->

@if(Auth::check())
    <!-- ADMIN VIEW - Edit Forms -->
    <div class="container-fluid py-5" style="background-color: #f9f9f9;">
        <div class="container py-5">
            <h3 class="text-success mb-5" style="font-weight: 700; font-size: 2rem;">
                <i class="fas fa-cog text-success me-2"></i>Edit Informasi Kontak
            </h3>
            
            <div class="row g-4">
                <!-- Edit Informasi Kontak -->
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card shadow-lg" style="border: none; border-top: 4px solid #28a745;">
                        <div class="card-header" style="background-color: #28a745; color: white;">
                            <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Alamat Kantor</h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('profil.update-kontak-alamat') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="alamat_kantor" class="form-label" style="font-weight: 600;">Alamat Kantor</label>
                                    <textarea class="form-control" id="alamat_kantor" name="alamat_kantor" rows="3" style="border: 1px solid #ddd; border-radius: 4px;">{{ old('alamat_kantor', ($profil && $profil->alamat_kantor) ? $profil->alamat_kantor : '') }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-success w-100" style="background-color: #28a745; border: none; font-weight: 600;">
                                    <i class="fas fa-save me-2"></i>Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Edit Telepon -->
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="card shadow-lg" style="border: none; border-top: 4px solid #28a745;">
                        <div class="card-header" style="background-color: #28a745; color: white;">
                            <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Telepon</h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('profil.update-kontak-telepon') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="telepon" class="form-label" style="font-weight: 600;">Nomor Telepon</label>
                                    <input type="tel" class="form-control" id="telepon" name="telepon" style="border: 1px solid #ddd; border-radius: 4px;" value="{{ old('telepon', ($profil && $profil->telepon) ? $profil->telepon : '') }}">
                                </div>
                                <button type="submit" class="btn btn-success w-100" style="background-color: #28a745; border: none; font-weight: 600;">
                                    <i class="fas fa-save me-2"></i>Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Edit Email -->
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="card shadow-lg" style="border: none; border-top: 4px solid #28a745;">
                        <div class="card-header" style="background-color: #28a745; color: white;">
                            <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Email</h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('profil.update-kontak-email') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label" style="font-weight: 600;">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" style="border: 1px solid #ddd; border-radius: 4px;" value="{{ old('email', ($profil && $profil->email) ? $profil->email : '') }}">
                                </div>
                                <button type="submit" class="btn btn-success w-100" style="background-color: #28a745; border: none; font-weight: 600;">
                                    <i class="fas fa-save me-2"></i>Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-5">
        @endif
    </div>
</div>
<!-- Contact Content End -->

@endsection

