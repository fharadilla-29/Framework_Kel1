@extends('layouts.app')

@section('content')
<!-- Hero Banner Start -->
<div style="position: relative; width: 100%; max-width: none; margin-left: 0; margin-right: 0; height: 500px; background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('{{ asset('template/img/carousel1.jpg') }}') center/cover no-repeat; display: flex; align-items: center; justify-content: center; margin-bottom: 0;">
    <div style="text-align: center; color: white;">
        <p style="font-size: 1.2rem; margin-bottom: 10px; letter-spacing: 2px;">Visi Misi</p>
        <h1 style="font-size: 3.5rem; font-weight: 700; margin: 0; color: white;">DESA TESO NILO</h1>
    </div>
</div>
<!-- Hero Banner End -->

<!-- Content Start -->
<div class="container-fluid py-5" style="background-color: #f9f9f9;">
    <div class="container py-5">
        <div style="text-align: center; margin-bottom: 40px;">
            <h2 class="text-success" style="font-weight: 700; font-size: 1.8rem; margin-bottom: 30px;">DESA TESO NILO</h2>
            <p style="color: #666; line-height: 1.8; font-size: 1rem; max-width: 900px; margin: 0 auto; text-align: justify;">
                Desa Teso Nilo memiliki visi dan misi yang jelas untuk membangun masa depan yang lebih baik. Dengan komitmen terhadap pembangunan berkelanjutan, peningkatan kualitas hidup masyarakat, dan pelestarian lingkungan, kami bekerja sama membangun desa yang maju, mandiri, dan sejahtera. Melalui pendekatan yang partisipatif dan kolaboratif, seluruh stakeholder desa berkomitmen untuk mencapai tujuan bersama.
            </p>
        </div>
    </div>
</div>
<!-- Content End -->

<!-- Visi Misi Detail Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-5">
            <!-- Visi -->
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); padding: 40px; border-radius: 8px; color: white; min-height: 300px; display: flex; flex-direction: column; justify-content: center; position: relative;">
                    <!-- Admin Edit/Delete Buttons -->
                    @if(Auth::check())
                        <div style="position: absolute; top: 15px; right: 15px; display: flex; gap: 10px;">
                            <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#editVisiModal" style="padding: 8px 12px;">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        </div>
                    @endif

                    <div style="margin-bottom: 20px;">
                        <i class="fas fa-eye" style="font-size: 2.5rem; margin-right: 15px;"></i>
                        <h3 style="display: inline; font-size: 1.8rem; font-weight: 700;">VISI</h3>
                    </div>
                    <div style="border-top: 3px solid rgba(255,255,255,0.3); padding-top: 20px; margin-bottom: 20px;"></div>
                    <p style="font-size: 1.1rem; line-height: 1.8; margin: 0;">
                        {{ ($profil && $profil->visi) ? $profil->visi : 'Mewujudkan Desa Teso Nilo yang mandiri, maju, dan berdaya serta sejahtera dengan tetap menjaga kelestarian lingkungan dan nilai-nilai budaya lokal.' }}
                    </p>
                </div>
            </div>

            <!-- Misi -->
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                <div style="background: #f9f9f9; padding: 40px; border-radius: 8px; border-left: 5px solid #28a745; position: relative;">
                    <!-- Admin Edit/Delete Buttons -->
                    @if(Auth::check())
                        <div style="position: absolute; top: 15px; right: 15px; display: flex; gap: 10px;">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editMisiModal" style="padding: 8px 12px;">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        </div>
                    @endif

                    <div style="margin-bottom: 20px;">
                        <i class="fas fa-tasks" style="font-size: 2.5rem; margin-right: 15px; color: #28a745;"></i>
                        <h3 style="display: inline; font-size: 1.8rem; font-weight: 700; color: #28a745;">MISI</h3>
                    </div>
                    <div style="border-top: 3px solid #28a745; padding-top: 20px; margin-bottom: 20px;"></div>
                    <ol style="margin: 0; padding-left: 20px; color: #333; line-height: 2;">
                        @if($profil && $profil->misi)
                            @foreach(explode("\n", trim($profil->misi)) as $item)
                                @if(trim($item))
                                    <li style="margin-bottom: 15px;">{{ trim($item) }}</li>
                                @endif
                            @endforeach
                        @else
                            <li style="margin-bottom: 15px;">Meningkatkan kualitas hidup masyarakat melalui pembangunan infrastruktur yang berkelanjutan dan layanan publik yang lebih baik</li>
                            <li style="margin-bottom: 15px;">Mengembangkan ekonomi lokal berbasis potensi desa dan memberdayakan UMKM masyarakat</li>
                            <li style="margin-bottom: 15px;">Meningkatkan akses pendidikan dan kesehatan untuk semua lapisan masyarakat</li>
                            <li>Memperkuat gotong royong dan partisipasi masyarakat dalam setiap program pembangunan desa</li>
                        @endif
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Visi Misi Detail End -->

@if(Auth::check())
    <!-- Modal Edit Visi -->
    <div class="modal fade" id="editVisiModal" tabindex="-1" aria-labelledby="editVisiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #28a745; color: white;">
                    <h5 class="modal-title" id="editVisiModalLabel">
                        <i class="fas fa-edit"></i> Edit Visi Desa
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profil.update-visi') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="visi" class="form-label" style="font-weight: 600; color: #28a745;">Visi Desa</label>
                            <textarea class="form-control @error('visi') is-invalid @enderror" 
                                      id="visi" name="visi" rows="8" style="border: 1px solid #ddd; border-radius: 4px;">{{ old('visi') ?? ($profil->visi ?? 'Mewujudkan Desa Teso Nilo yang mandiri, maju, dan berdaya serta sejahtera dengan tetap menjaga kelestarian lingkungan dan nilai-nilai budaya lokal.') }}</textarea>
                            @error('visi')
                                <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn text-white" style="background-color: #28a745;">
                            <i class="fas fa-save"></i> Simpan Visi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Misi -->
    <div class="modal fade" id="editMisiModal" tabindex="-1" aria-labelledby="editMisiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #20c997; color: white;">
                    <h5 class="modal-title" id="editMisiModalLabel">
                        <i class="fas fa-edit"></i> Edit Misi Desa
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profil.update-misi') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="misi" class="form-label" style="font-weight: 600; color: #20c997;">Misi Desa</label>
                            <textarea class="form-control @error('misi') is-invalid @enderror" 
                                      id="misi" name="misi" rows="8" style="border: 1px solid #ddd; border-radius: 4px;">{{ old('misi') ?? ($profil->misi ?? "Meningkatkan kualitas hidup masyarakat melalui pembangunan infrastruktur yang berkelanjutan dan layanan publik yang lebih baik\nMengembangkan ekonomi lokal berbasis potensi desa dan memberdayakan UMKM masyarakat\nMeningkatkan akses pendidikan dan kesehatan untuk semua lapisan masyarakat\nMemperkuat gotong royong dan partisipasi masyarakat dalam setiap program pembangunan desa") }}</textarea>
                            <small class="text-muted d-block mt-2">Tips: Pisahkan setiap poin misi dengan baris baru (Enter)</small>
                            @error('misi')
                                <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn text-white" style="background-color: #20c997;">
                            <i class="fas fa-save"></i> Simpan Misi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

<!-- Tagline Start -->
<div class="container-fluid py-5" style="background-color: #f9f9f9;">
    <div class="container py-5 text-center">
        <h3 style="color: #333; font-weight: 700; font-size: 1.2rem; letter-spacing: 2px;">
            #DesaMaju #PembangunanBerlanjutan #GotongRoyong #DesaTeso
        </h3>
    </div>
</div>
<!-- Tagline End -->
@endsection
