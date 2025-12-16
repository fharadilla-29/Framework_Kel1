@extends('layouts.app')

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header" style="background-color: #28a745; color: white; font-weight: 600;">
                        <i class="fas fa-edit me-2"></i>Edit Media
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Terjadi Kesalahan!</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- File Preview -->
                        <div class="mb-4 text-center">
                            @php
                                $isImage = in_array($media->mime_type, ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml']);
                            @endphp
                            @if($isImage)
                                <img src="{{ asset('storage/' . $media->file_url) }}" alt="Media" style="max-width: 300px; max-height: 300px; border-radius: 8px; object-fit: contain;">
                            @else
                                <div style="width: 300px; height: 300px; background-color: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    <div>
                                        <i class="fas fa-file" style="font-size: 80px; color: #ccc;"></i>
                                        <p class="text-muted mt-2">{{ basename($media->file_url) }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <form action="{{ route('media.update', $media->media_id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Caption -->
                            <div class="mb-3">
                                <label for="caption" class="form-label fw-bold">Caption/Deskripsi</label>
                                <textarea class="form-control @error('caption') is-invalid @enderror" 
                                    id="caption" name="caption" rows="3" 
                                    placeholder="Masukkan deskripsi media">{{ old('caption', $media->caption) }}</textarea>
                                @error('caption')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <!-- Reference Table -->
                                <div class="col-md-6 mb-3">
                                    <label for="ref_table" class="form-label fw-bold">Tipe Referensi</label>
                                    <select class="form-select @error('ref_table') is-invalid @enderror" 
                                        id="ref_table" name="ref_table">
                                        <option value="">-- Pilih Tipe --</option>
                                        <option value="agenda" {{ old('ref_table', $media->ref_table) == 'agenda' ? 'selected' : '' }}>Agenda</option>
                                        <option value="galeri" {{ old('ref_table', $media->ref_table) == 'galeri' ? 'selected' : '' }}>Galeri</option>
                                        <option value="berita" {{ old('ref_table', $media->ref_table) == 'berita' ? 'selected' : '' }}>Berita</option>
                                        <option value="navbar" {{ old('ref_table', $media->ref_table) == 'navbar' ? 'selected' : '' }}>Navbar</option>
                                        <option value="umum" {{ old('ref_table', $media->ref_table) == 'umum' ? 'selected' : '' }}>Umum</option>
                                    </select>
                                    @error('ref_table')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Reference ID -->
                                <div class="col-md-6 mb-3">
                                    <label for="ref_id" class="form-label fw-bold">ID Referensi</label>
                                    <input type="number" class="form-control @error('ref_id') is-invalid @enderror" 
                                        id="ref_id" name="ref_id" value="{{ old('ref_id', $media->ref_id) }}" 
                                        placeholder="Masukkan ID dari tabel yang direferensikan">
                                    <small class="text-muted d-block mt-2">Opsional - Untuk menghubungkan dengan item spesifik</small>
                                    @error('ref_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Sort Order -->
                            <div class="mb-3">
                                <label for="sort_order" class="form-label fw-bold">Urutan Tampilan</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                    id="sort_order" name="sort_order" value="{{ old('sort_order', $media->sort_order) }}" min="0">
                                <small class="text-muted d-block mt-2">Angka lebih kecil ditampilkan lebih dulu</small>
                                @error('sort_order')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- File Info -->
                            <div class="alert alert-info mb-3">
                                <small>
                                    <strong>Info File:</strong><br>
                                    Tipe: {{ $media->mime_type }}<br>
                                    Tanggal Upload: {{ $media->created_at->format('d M Y H:i') }}
                                </small>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn btn-success" style="background-color: #28a745; border: none; font-weight: 600;">
                                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                                </button>
                                <a href="{{ route('media.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
