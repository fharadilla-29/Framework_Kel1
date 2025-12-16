@extends('layouts.app')

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header" style="background-color: #28a745; color: white; font-weight: 600;">
                        <i class="fas fa-cloud-upload-alt me-2"></i>Upload Media Baru
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

                        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- File Upload -->
                            <div class="mb-3">
                                <label for="file" class="form-label fw-bold">Upload File <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="file" class="form-control @error('file') is-invalid @enderror" 
                                        id="file" name="file" accept=".jpg,.jpeg,.png,.gif,.svg,.pdf,.doc,.docx" required>
                                    <label class="input-group-text">Pilih File</label>
                                </div>
                                <small class="text-muted d-block mt-2">Format: JPEG, PNG, GIF, SVG, PDF, DOC, DOCX | Maksimal 5MB</small>
                                @error('file')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Caption -->
                            <div class="mb-3">
                                <label for="caption" class="form-label fw-bold">Caption/Deskripsi</label>
                                <textarea class="form-control @error('caption') is-invalid @enderror" 
                                    id="caption" name="caption" rows="3" 
                                    placeholder="Masukkan deskripsi media (opsional)">{{ old('caption') }}</textarea>
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
                                        <option value="agenda" {{ old('ref_table') == 'agenda' ? 'selected' : '' }}>Agenda</option>
                                        <option value="galeri" {{ old('ref_table') == 'galeri' ? 'selected' : '' }}>Galeri</option>
                                        <option value="berita" {{ old('ref_table') == 'berita' ? 'selected' : '' }}>Berita</option>
                                        <option value="navbar" {{ old('ref_table') == 'navbar' ? 'selected' : '' }}>Navbar</option>
                                        <option value="umum" {{ old('ref_table') == 'umum' ? 'selected' : '' }}>Umum</option>
                                    </select>
                                    @error('ref_table')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Reference ID -->
                                <div class="col-md-6 mb-3">
                                    <label for="ref_id" class="form-label fw-bold">ID Referensi</label>
                                    <input type="number" class="form-control @error('ref_id') is-invalid @enderror" 
                                        id="ref_id" name="ref_id" value="{{ old('ref_id') }}" 
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
                                    id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                                <small class="text-muted d-block mt-2">Angka lebih kecil ditampilkan lebih dulu</small>
                                @error('sort_order')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn btn-success" style="background-color: #28a745; border: none; font-weight: 600;">
                                    <i class="fas fa-upload me-2"></i>Upload Media
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
