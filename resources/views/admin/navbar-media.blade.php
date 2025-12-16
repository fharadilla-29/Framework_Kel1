@extends('layouts.app')

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <!-- Header -->
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="text-dark" style="font-weight: 700; margin: 0;">Manajemen Logo & Media Navbar</h2>
                    <p class="text-muted mt-2">Kelola logo, banner, dan media yang ditampilkan di navbar website</p>
                </div>
                <div>
                    <a href="{{ route('media.create') }}" class="btn text-white" style="background-color: #28a745; font-weight: 600;">
                        <i class="fas fa-plus me-2"></i>Tambah Media ke Navbar
                    </a>
                </div>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Current Navbar Media -->
        @if($medias->count() > 0)
            <div class="row mb-5">
                <div class="col-12">
                    <h5 class="mb-3" style="font-weight: 600;">Media Aktif di Navbar:</h5>
                    <div class="row g-3">
                        @foreach($medias as $media)
                            <div class="col-md-3">
                                <div class="card shadow-sm text-center">
                                    @php
                                        $isImage = in_array($media->mime_type, ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml']);
                                    @endphp
                                    @if($isImage)
                                        <img src="{{ asset('storage/' . $media->file_url) }}" class="card-img-top" style="height: 150px; object-fit: contain; padding: 10px;">
                                    @else
                                        <div class="card-body d-flex align-items-center justify-content-center" style="height: 150px;">
                                            <i class="fas fa-file" style="font-size: 60px; color: #ccc;"></i>
                                        </div>
                                    @endif
                                    <div class="card-body">
                                        <small class="text-muted d-block mb-2">{{ basename($media->file_url) }}</small>
                                        @if($media->caption)
                                            <small class="text-dark"><strong>{{ $media->caption }}</strong></small>
                                        @endif
                                        <p class="text-muted mt-2 mb-2"><small>Urutan: {{ $media->sort_order }}</small></p>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('media.edit', $media->media_id) }}" class="btn btn-sm btn-info text-white flex-grow-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('media.destroy', $media->media_id) }}" method="POST" style="flex-grow: 1;" onsubmit="return confirm('Hapus media dari navbar?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger w-100">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info mb-4">
                <i class="fas fa-info-circle me-2"></i>Belum ada media di navbar. <a href="{{ route('media.create') }}" class="alert-link">Tambahkan media baru</a>
            </div>
        @endif

        <!-- Info -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card bg-light border-0">
                    <div class="card-body">
                        <h6 class="card-title mb-3">💡 Cara Menambahkan Media ke Navbar:</h6>
                        <ol>
                            <li>Klik tombol "Tambah Media ke Navbar"</li>
                            <li>Pilih file gambar atau dokumen yang ingin ditampilkan</li>
                            <li>Pada field "Tipe Referensi", pilih <strong>"navbar"</strong></li>
                            <li>Atur urutan tampilan dengan angka (lebih kecil = tampil lebih dulu)</li>
                            <li>Klik "Upload Media" untuk menyimpan</li>
                        </ol>
                        <p class="text-muted mb-0"><small>Media navbar akan ditampilkan di area khusus navbar website Anda</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
