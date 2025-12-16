@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid bg-light py-4">
    <div class="container py-4">
        <h1 class="display-4 text-success mb-3">Wisata & Alam</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Berita</a></li>
                <li class="breadcrumb-item active">Wisata & Alam</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Berita Content Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <!-- Add Button for Admin -->
        @if(Auth::check())
            <div class="mb-4">
                <a href="{{ route('berita.create', 'wisata') }}" class="btn btn-success" style="background-color: #28a745; border: none; font-weight: 600;">
                    <i class="fas fa-plus me-2"></i>Tambah Berita
                </a>
            </div>
        @endif

        @if($beritas->isEmpty())
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>Belum ada berita wisata & alam desa.
            </div>
        @else
            <div class="row g-5">
                @foreach($beritas as $berita)
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div style="background-color: #f9f9f9; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); position: relative;">
                            <!-- Image -->
                            <div style="position: relative; height: 200px;">
                                @if($berita->medias && $berita->medias->count() > 0)
                                    @php $firstMedia = $berita->medias->first(); @endphp
                                    <img src="{{ asset('storage/' . $firstMedia->file_url) }}" class="img-fluid w-100" style="height: 100%; object-fit: cover;" alt="{{ $berita->judul }}">
                                @else
                                    <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('template/img/placeholder.jpg') }}" class="img-fluid w-100" style="height: 100%; object-fit: cover;" alt="{{ $berita->judul }}">
                                @endif
                                
                                <!-- Edit/Delete Overlay for Admin -->
                                @if(Auth::check())
                                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.7); display: flex; gap: 10px; justify-content: center; align-items: center; opacity: 0; transition: opacity 0.3s ease;" class="admin-overlay">
                                        <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-primary btn-sm" style="border: none;">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </a>
                                        <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin hapus berita ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="border: none;">
                                                <i class="fas fa-trash me-1"></i>Hapus
                                            </button>
                                        </form>
                                    </div>

                                    <style>
                                        .col-lg-6 .admin-overlay:hover {
                                            opacity: 1 !important;
                                        }
                                    </style>
                                @endif
                            </div>

                            <div class="p-4">
                                <p style="color: #28a745; font-weight: 600; font-size: 0.9rem; margin-bottom: 10px;">{{ $berita->tanggal_terbit->format('d F Y') }}</p>
                                <h5 class="text-dark mb-3" style="font-weight: 700;">{{ $berita->judul }}</h5>
                                <p style="color: #666; line-height: 1.6; margin-bottom: 15px;">{{ Str::limit(strip_tags($berita->konten), 150) }}</p>
                                <a href="#" class="btn btn-success btn-sm" style="background-color: #28a745; border: none;">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
<!-- Berita Content End -->
@endsection
