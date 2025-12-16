@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #28a745; color: white; font-weight: 600;">
                    <i class="fas fa-plus me-2"></i>Tambah Agenda Baru
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

                    <form action="{{ route('agenda.store') }}" method="POST">
                        @csrf

                        <!-- Judul -->
                        <div class="mb-3">
                            <label for="judul" class="form-label fw-bold">Judul Agenda <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                id="judul" name="judul" value="{{ old('judul') }}" 
                                placeholder="Masukkan judul agenda" required>
                            @error('judul')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-bold">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                id="deskripsi" name="deskripsi" rows="4" 
                                placeholder="Masukkan deskripsi agenda" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <!-- Lokasi -->
                            <div class="col-md-6 mb-3">
                                <label for="lokasi" class="form-label fw-bold">Lokasi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" 
                                    id="lokasi" name="lokasi" value="{{ old('lokasi') }}" 
                                    placeholder="Masukkan lokasi agenda" required>
                                @error('lokasi')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tanggal -->
                            <div class="col-md-6 mb-3">
                                <label for="tanggal" class="form-label fw-bold">Tanggal <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                                    id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                                @error('tanggal')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- Waktu Mulai -->
                            <div class="col-md-6 mb-3">
                                <label for="waktu_mulai" class="form-label fw-bold">Waktu Mulai <span class="text-danger">*</span></label>
                                <input type="time" class="form-control @error('waktu_mulai') is-invalid @enderror" 
                                    id="waktu_mulai" name="waktu_mulai" value="{{ old('waktu_mulai') }}" required>
                                @error('waktu_mulai')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Waktu Selesai -->
                            <div class="col-md-6 mb-3">
                                <label for="waktu_selesai" class="form-label fw-bold">Waktu Selesai</label>
                                <input type="time" class="form-control @error('waktu_selesai') is-invalid @enderror" 
                                    id="waktu_selesai" name="waktu_selesai" value="{{ old('waktu_selesai') }}">
                                @error('waktu_selesai')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Penyelenggara -->
                        <div class="mb-3">
                            <label for="penyelenggara" class="form-label fw-bold">Penyelenggara <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror" 
                                id="penyelenggara" name="penyelenggara" value="{{ old('penyelenggara') }}" 
                                placeholder="Masukkan nama penyelenggara/organisasi" required>
                            @error('penyelenggara')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-success" style="background-color: #28a745; border: none; font-weight: 600;">
                                <i class="fas fa-save me-2"></i>Simpan Agenda
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
