@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid bg-light py-4">
    <div class="container py-4">
        <h1 class="display-4 text-success mb-3">Edit Berita</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Edit Berita</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Form Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow-lg" style="border: none; border-top: 4px solid #28a745;">
                    <div class="card-header" style="background-color: #28a745; color: white;">
                        <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Form Edit Berita</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="judul" class="form-label" style="font-weight: 600;">Judul Berita</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" placeholder="Masukkan judul berita" style="border: 1px solid #ddd; border-radius: 4px;">
                                @error('judul')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kategori" class="form-label" style="font-weight: 600;">Kategori</label>
                                <input type="text" class="form-control" id="kategori" disabled value="{{ ucwords(str_replace('-', ' ', $berita->kategori)) }}" style="border: 1px solid #ddd; border-radius: 4px;">
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_terbit" class="form-label" style="font-weight: 600;">Tanggal Terbit</label>
                                <input type="date" class="form-control @error('tanggal_terbit') is-invalid @enderror" id="tanggal_terbit" name="tanggal_terbit" value="{{ old('tanggal_terbit', $berita->tanggal_terbit->format('Y-m-d')) }}" style="border: 1px solid #ddd; border-radius: 4px;">
                                @error('tanggal_terbit')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="gambar" class="form-label" style="font-weight: 600;">Gambar Berita</label>
                                
                                @if($berita->gambar)
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-thumbnail" style="max-width: 300px; max-height: 200px; object-fit: cover;">
                                        <p class="mt-2"><small class="text-muted">Gambar saat ini</small></p>
                                    </div>
                                @endif

                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*" style="border: 1px solid #ddd; border-radius: 4px;">
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar. Format: JPG, PNG, GIF. Ukuran maksimal: 2MB</small>
                                @error('gambar')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="konten" class="form-label" style="font-weight: 600;">Konten Berita</label>
                                <textarea class="form-control @error('konten') is-invalid @enderror" id="konten" name="konten" rows="8" placeholder="Masukkan konten berita lengkap..." style="border: 1px solid #ddd; border-radius: 4px;">{{ old('konten', $berita->konten) }}</textarea>
                                @error('konten')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success" style="background-color: #28a745; border: none; font-weight: 600;">
                                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                                </button>
                                <a href="/berita/{{ $berita->kategori }}" class="btn btn-secondary" style="border: none; font-weight: 600;">
                                    <i class="fas fa-times me-2"></i>Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form End -->
@endsection
