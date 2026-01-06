@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid bg-light py-4">
    <div class="container py-4">
        <h1 class="display-4 text-success mb-3">Tambah Berita</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Tambah Berita</li>
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
                        <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Form Tambah Berita</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="judul" class="form-label" style="font-weight: 600;">Judul Berita</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Masukkan judul berita" style="border: 1px solid #ddd; border-radius: 4px;">
                                @error('judul')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kategori" class="form-label" style="font-weight: 600;">Kategori</label>
                                <input type="hidden" name="kategori_slug" value="{{ $kategori }}">
                                <input type="text" class="form-control" id="kategori" disabled value="{{ ucwords(str_replace('-', ' ', $kategori)) }}" style="border: 1px solid #ddd; border-radius: 4px;">
                                <small class="text-muted">Kategori sudah ditentukan dari halaman berita yang Anda buka</small>
                            </div>

                            <div class="mb-3">
                                <label for="penulis" class="form-label" style="font-weight: 600;">Penulis</label>
                                <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" name="penulis" value="{{ old('penulis', auth()->user()->name ?? '') }}" placeholder="Nama penulis" style="border: 1px solid #ddd; border-radius: 4px;">
                                @error('penulis')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="terbit_at" class="form-label" style="font-weight: 600;">Tanggal Terbit</label>
                                <input type="date" class="form-control @error('terbit_at') is-invalid @enderror" id="terbit_at" name="terbit_at" value="{{ old('terbit_at', date('Y-m-d')) }}" style="border: 1px solid #ddd; border-radius: 4px;">
                                @error('terbit_at')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cover" class="form-label" style="font-weight: 600;">Cover Berita</label>
                                <input type="file" class="form-control @error('cover') is-invalid @enderror" id="cover" name="cover" accept="image/*" style="border: 1px solid #ddd; border-radius: 4px;">
                                <small class="text-muted">Format: JPG, PNG, GIF. Ukuran maksimal: 2MB</small>
                                @error('cover')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="isi_html" class="form-label" style="font-weight: 600;">Konten Berita</label>
                                <textarea class="form-control @error('isi_html') is-invalid @enderror" id="isi_html" name="isi_html" rows="8" placeholder="Masukkan konten berita lengkap..." style="border: 1px solid #ddd; border-radius: 4px;">{{ old('isi_html') }}</textarea>
                                @error('isi_html')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success" style="background-color: #28a745; border: none; font-weight: 600;">
                                    <i class="fas fa-save me-2"></i>Simpan Berita
                                </button>
                                <a href="/berita/{{ $kategori }}" class="btn btn-secondary" style="border: none; font-weight: 600;">
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
