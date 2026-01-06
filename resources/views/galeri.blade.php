@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid bg-light py-4">
    <div class="container py-4">
        <h1 class="display-4 text-success mb-3">Galeri Desa</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Galeri</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Galeri Content Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Add Button - Only for Admin -->
        @if(Auth::check())
            <div class="mb-4">
                <a href="{{ route('galeri.create') }}" class="btn text-white" style="background-color: #28a745; font-weight: 600;">
                    <i class="fas fa-plus"></i> Tambah Galeri
                </a>
            </div>
        @endif

        @if($galleries->count() > 0)
            <div class="row g-4">
                @foreach($galleries as $gallery)
                    <div class="col-lg-6 col-xl-4 wow fadeInUp">
                        <div style="position: relative; overflow: hidden; border-radius: 8px; background-color: #f9f9f9; height: 250px;">
                            @if($gallery->medias && $gallery->medias->count() > 0)
                                @php $firstMedia = $gallery->medias->first(); @endphp
                                <img src="{{ asset('storage/' . $firstMedia->path) }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="{{ $gallery->judul }}">
                            @elseif($gallery->gambar)
                                <img src="{{ asset('storage/' . $gallery->gambar) }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="{{ $gallery->judul }}">
                            @else
                                <img src="{{ asset('img/placeholder.jpg') }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="No Image">
                            @endif
                            
                            <!-- Hover Overlay - Only for Admin -->
                            @if(Auth::check())
                                <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(40, 167, 69, 0.6); opacity: 0; transition: opacity 0.3s ease; display: flex; align-items: center; justify-content: center; flex-direction: column;" class="hover-overlay">
                                    <div style="text-align: center;">
                                        <p style="color: white; margin: 0; font-weight: 600;">{{ $gallery->judul }}</p>
                                        <small style="color: white;">{{ $gallery->kategori ?? '' }}</small>
                                        <div class="mt-3">
                                            <a href="{{ route('galeri.edit', $gallery->galeri_id) }}" class="btn btn-sm btn-light me-2" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('galeri.destroy', $gallery->galeri_id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus galeri ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <style>
                                    .hover-overlay:hover {
                                        opacity: 1 !important;
                                    }
                                </style>
                            @endif
                        </div>
                        <p style="color: #28a745; font-weight: 600; margin-top: 15px; margin-bottom: 5px;">{{ $gallery->kategori ?? '' }}</p>
                        <h5 class="text-dark" style="font-weight: 700;">{{ $gallery->judul }}</h5>
                        @if($gallery->deskripsi)
                            <p style="color: #666; font-size: 0.95rem; margin-bottom: 10px;">{{ Str::limit($gallery->deskripsi, 100, '...') }}</p>
                        @endif
                        
                        <!-- Media Counter -->
                        @if($gallery->medias && $gallery->medias->count() > 0)
                            <small style="color: #28a745;"><i class="fas fa-images me-1"></i>{{ $gallery->medias->count() }} media</small>
                        @else
                            <small style="color: #999;">{{ $gallery->created_at->format('d M Y') }}</small>
                        @endif
                        
                        <!-- Edit/Delete Buttons - Only for Admin -->
                        @if(Auth::check())
                            <div class="mt-3 d-flex gap-2">
                                <a href="{{ route('galeri.edit', $gallery->galeri_id) }}" class="btn btn-sm text-white" style="background-color: #28a745; flex: 1; text-align: center;">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('galeri.destroy', $gallery->galeri_id) }}" method="POST" style="flex: 1;" onsubmit="return confirm('Yakin ingin menghapus galeri ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger w-100">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center" role="alert">
                <i class="fas fa-info-circle"></i> Belum ada galeri. 
                @if(Auth::check())
                    <a href="{{ route('galeri.create') }}" class="alert-link">Tambahkan sekarang</a>
                @endif
            </div>
        @endif
    </div>
</div>
<!-- Galeri Content End -->
@endsection
