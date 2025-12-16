@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-dark py-3">
                    <h3 class="mb-0">
                        <i class="fas fa-user-edit"></i> Edit Data Warga
                    </h3>
                </div>

                <div class="card-body p-4">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h5 class="alert-heading">
                                <i class="fas fa-exclamation-circle"></i> Validasi Gagal
                            </h5>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST" novalidate class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="foto" class="form-label fw-bold">
                                <i class="fas fa-image"></i> Foto Profil
                            </label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                                id="foto" name="foto" accept="image/*" onchange="previewFoto(this)">
                            <small class="text-muted d-block mt-2">Format: JPEG, PNG, JPG, GIF | Ukuran maksimal: 2MB</small>
                            @error('foto')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            
                            <div id="fotoPreview" class="mt-3">
                                @if($warga->foto)
                                    <div class="current-photo mb-3">
                                        <small class="text-muted d-block mb-2">Foto saat ini:</small>
                                        <img src="{{ asset($warga->foto) }}" alt="{{ $warga->nama }}" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                    </div>
                                @else
                                    <div class="text-muted" style="display: none;">Belum ada foto</div>
                                @endif
                                <img id="previewImg" src="" alt="Preview" class="img-thumbnail" style="max-width: 200px; max-height: 200px; display: none; margin-top: 10px;">
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="no_ktp" class="form-label fw-bold">
                                    <i class="fas fa-id-card"></i> Nomor KTP <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" 
                                    id="no_ktp" name="no_ktp" value="{{ old('no_ktp', $warga->no_ktp) }}" 
                                    placeholder="16 digit KTP" maxlength="16" inputmode="numeric"
                                    required>
                                @error('no_ktp')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label fw-bold">
                                    <i class="fas fa-user"></i> Nama Lengkap <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                    id="nama" name="nama" value="{{ old('nama', $warga->nama) }}" 
                                    placeholder="Nama lengkap warga" required>
                                @error('nama')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="jenis_kelamin" class="form-label fw-bold">
                                    <i class="fas fa-person"></i> Jenis Kelamin <span class="text-danger">*</span>
                                </label>
                                <select class="form-select @error('jenis_kelamin') is-invalid @enderror" 
                                    id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" @selected(old('jenis_kelamin', $warga->jenis_kelamin) == 'Laki-laki')>Laki-laki</option>
                                    <option value="Perempuan" @selected(old('jenis_kelamin', $warga->jenis_kelamin) == 'Perempuan')>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="agama" class="form-label fw-bold">
                                    <i class="fas fa-place-of-worship"></i> Agama <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('agama') is-invalid @enderror" 
                                    id="agama" name="agama" value="{{ old('agama', $warga->agama) }}" 
                                    placeholder="Misalnya: Islam, Kristen, Katolik, Hindu, Buddha" required>
                                @error('agama')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="pekerjaan" class="form-label fw-bold">
                                    <i class="fas fa-briefcase"></i> Pekerjaan <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" 
                                    id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan', $warga->pekerjaan) }}" 
                                    placeholder="Pekerjaan/Profesi" required>
                                @error('pekerjaan')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="telp" class="form-label fw-bold">
                                    <i class="fas fa-phone"></i> Nomor Telepon <span class="text-danger">*</span>
                                </label>
                                <input type="tel" class="form-control @error('telp') is-invalid @enderror" 
                                    id="telp" name="telp" value="{{ old('telp', $warga->telp) }}" 
                                    placeholder="Contoh: 082XXXXXXXXX" required>
                                @error('telp')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">
                                <i class="fas fa-envelope"></i> Email <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                id="email" name="email" value="{{ old('email', $warga->email) }}" 
                                placeholder="email@example.com" required>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 justify-content-end mt-4">
                            <a href="{{ route('warga.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save"></i> Perbarui
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewFoto(input) {
    const previewImg = document.getElementById('previewImg');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewImg.style.display = 'block';
        };
        
        reader.readAsDataURL(input.files[0]);
    } else {
        previewImg.style.display = 'none';
    }
}
</script>
@endsection
