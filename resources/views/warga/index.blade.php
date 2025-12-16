@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h1 class="mb-0">
                <i class="fas fa-users" style="color: #28a745;"></i> Data Warga Desa
            </h1>
        </div>
        <div class="col-md-6 text-end">
            @auth
                <a href="{{ route('warga.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Tambah Warga
                </a>
            @endauth
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($wargas->count() > 0)
        <div class="row">
            @foreach($wargas as $warga)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm border-0 position-relative warga-card">
                        @if($warga->foto)
                            <div class="warga-photo-container" style="height: 250px; overflow: hidden; background-color: #f8f9fa;">
                                <img src="{{ asset($warga->foto) }}" alt="{{ $warga->nama }}" class="w-100 h-100 object-fit-cover">
                            </div>
                        @else
                            <div class="warga-photo-container d-flex align-items-center justify-content-center" style="height: 250px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                <div class="text-center text-white">
                                    <i class="fas fa-user-circle" style="font-size: 80px; opacity: 0.5;"></i>
                                    <p class="mt-2 mb-0">Tidak ada foto</p>
                                </div>
                            </div>
                        @endif

                        <div class="card-body">
                            <h5 class="card-title text-truncate" title="{{ $warga->nama }}">
                                {{ $warga->nama }}
                            </h5>
                            
                            <div class="warga-info mt-3">
                                <p class="mb-2">
                                    <small class="text-muted">
                                        <i class="fas fa-id-card"></i> No. KTP:
                                    </small>
                                    <br>
                                    <strong class="text-monospace">{{ $warga->no_ktp }}</strong>
                                </p>
                                
                                <p class="mb-2">
                                    <small class="text-muted">
                                        <i class="fas fa-person"></i> Jenis Kelamin:
                                    </small>
                                    <br>
                                    <strong>{{ $warga->jenis_kelamin }}</strong>
                                </p>
                                
                                <p class="mb-2">
                                    <small class="text-muted">
                                        <i class="fas fa-briefcase"></i> Pekerjaan:
                                    </small>
                                    <br>
                                    <strong>{{ $warga->pekerjaan }}</strong>
                                </p>
                                
                                <p class="mb-2">
                                    <small class="text-muted">
                                        <i class="fas fa-place-of-worship"></i> Agama:
                                    </small>
                                    <br>
                                    <strong>{{ $warga->agama }}</strong>
                                </p>

                                <p class="mb-2">
                                    <small class="text-muted">
                                        <i class="fas fa-phone"></i> Telepon:
                                    </small>
                                    <br>
                                    <strong class="text-break">{{ $warga->telp }}</strong>
                                </p>

                                <p class="mb-0">
                                    <small class="text-muted">
                                        <i class="fas fa-envelope"></i> Email:
                                    </small>
                                    <br>
                                    <strong class="text-break" style="font-size: 0.95rem;">{{ $warga->email }}</strong>
                                </p>
                            </div>
                        </div>

                        @auth
                            <div class="card-footer bg-white border-top d-flex gap-2 justify-content-between">
                                <a href="{{ route('warga.edit', $warga->warga_id) }}" class="btn btn-sm btn-warning flex-grow-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                
                                <button type="button" class="btn btn-sm btn-danger flex-grow-1" data-bs-toggle="modal" 
                                    data-bs-target="#deleteModal{{ $warga->warga_id }}">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $warga->warga_id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title">
                                                <i class="fas fa-exclamation-triangle"></i> Hapus Data Warga
                                            </h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus data warga:</p>
                                            <p class="text-danger fw-bold">{{ $warga->nama }}</p>
                                            <p class="text-muted small">Tindakan ini tidak dapat dibatalkan.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                <i class="fas fa-times"></i> Batal
                                            </button>
                                            <form action="{{ route('warga.destroy', $warga->warga_id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $wargas->links() }}
        </div>
    @else
        <div class="alert alert-info text-center py-5" role="alert">
            <i class="fas fa-info-circle" style="font-size: 2rem;"></i>
            <p class="mt-3 mb-0">Belum ada data warga. @auth <a href="{{ route('warga.create') }}">Tambah warga sekarang</a> @endauth</p>
        </div>
    @endif
</div>

<style>
    .warga-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .warga-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(40, 167, 69, 0.2) !important;
    }

    .warga-info small {
        font-size: 0.75rem;
    }

    .text-monospace {
        font-family: 'Courier New', monospace;
    }

    .warga-photo-container {
        position: relative;
    }

    .warga-photo-container img {
        object-fit: cover;
    }
</style>
@endsection
