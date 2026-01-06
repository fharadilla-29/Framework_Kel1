@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #28a745; color: white; font-weight: 600;">
                    <i class="fas fa-edit me-2"></i>Edit Agenda
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

                    <form action="{{ route('agenda.update', $agenda->agenda_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Judul -->
                        <div class="mb-3">
                            <label for="judul" class="form-label fw-bold">Judul Agenda <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                id="judul" name="judul" value="{{ old('judul', $agenda->judul) }}" 
                                placeholder="Masukkan judul agenda" required>
                            @error('judul')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                id="deskripsi" name="deskripsi" rows="4" 
                                placeholder="Masukkan deskripsi agenda">{{ old('deskripsi', $agenda->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <!-- Lokasi -->
                            <div class="col-md-6 mb-3">
                                <label for="lokasi" class="form-label fw-bold">Lokasi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" 
                                    id="lokasi" name="lokasi" value="{{ old('lokasi', $agenda->lokasi) }}" 
                                    placeholder="Masukkan lokasi agenda" required>
                                @error('lokasi')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Penyelenggara -->
                            <div class="col-md-6 mb-3">
                                <label for="penyelenggara" class="form-label fw-bold">Penyelenggara</label>
                                <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror" 
                                    id="penyelenggara" name="penyelenggara" value="{{ old('penyelenggara', $agenda->penyelenggara) }}" 
                                    placeholder="Nama penyelenggara">
                                @error('penyelenggara')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- Tanggal Mulai -->
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_mulai" class="form-label fw-bold">Tanggal & Waktu Mulai <span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control @error('tanggal_mulai') is-invalid @enderror" 
                                    id="tanggal_mulai" name="tanggal_mulai" 
                                    value="{{ old('tanggal_mulai', $agenda->tanggal_mulai ? $agenda->tanggal_mulai->format('Y-m-d\TH:i') : '') }}" required>
                                @error('tanggal_mulai')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tanggal Selesai -->
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_selesai" class="form-label fw-bold">Tanggal & Waktu Selesai</label>
                                <input type="datetime-local" class="form-control @error('tanggal_selesai') is-invalid @enderror" 
                                    id="tanggal_selesai" name="tanggal_selesai" 
                                    value="{{ old('tanggal_selesai', $agenda->tanggal_selesai ? $agenda->tanggal_selesai->format('Y-m-d\TH:i') : '') }}">
                                @error('tanggal_selesai')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Poster -->
                        <div class="mb-3">
                            <label for="poster" class="form-label fw-bold">Poster</label>
                            @if($agenda->poster)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $agenda->poster) }}" alt="Poster" class="img-thumbnail" style="max-width: 200px;">
                                    <p class="text-muted small mt-1">Poster saat ini</p>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('poster') is-invalid @enderror" 
                                id="poster" name="poster" accept="image/*">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah. Format: JPG, PNG, GIF. Ukuran maksimal: 2MB</small>
                            @error('poster')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-success" style="background-color: #28a745; border: none; font-weight: 600;">
                                <i class="fas fa-save me-2"></i>Simpan Perubahan
                            </button>
                            <a href="{{ route('agenda.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
