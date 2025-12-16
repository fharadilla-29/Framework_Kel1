@extends('layouts.app')

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <!-- Header -->
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="text-dark" style="font-weight: 700; margin: 0;">Manajemen Media</h2>
                    <p class="text-muted mt-2">Kelola semua media/file untuk agenda, galeri, berita, dan lainnya</p>
                </div>
                <div>
                    <a href="{{ route('media.create') }}" class="btn text-white" style="background-color: #28a745; font-weight: 600;">
                        <i class="fas fa-plus me-2"></i>Tambah Media
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

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Media Table -->
        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead style="background-color: #f9f9f9; border-bottom: 2px solid #dee2e6;">
                        <tr>
                            <th style="color: #28a745; font-weight: 600;">File</th>
                            <th style="color: #28a745; font-weight: 600;">Caption</th>
                            <th style="color: #28a745; font-weight: 600;">Tipe Referensi</th>
                            <th style="color: #28a745; font-weight: 600;">Tipe File</th>
                            <th style="color: #28a745; font-weight: 600;">Urutan</th>
                            <th style="color: #28a745; font-weight: 600;">Tanggal Upload</th>
                            <th style="color: #28a745; font-weight: 600;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($medias as $media)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        @php
                                            $isImage = in_array($media->mime_type, ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml']);
                                        @endphp
                                        @if($isImage)
                                            <img src="{{ asset('storage/' . $media->file_url) }}" alt="Media" style="width: 40px; height: 40px; border-radius: 4px; object-fit: cover;">
                                        @else
                                            <div style="width: 40px; height: 40px; background-color: #f0f0f0; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-file"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <small class="text-muted d-block">{{ basename($media->file_url) }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <small>{{ $media->caption ?? '-' }}</small>
                                </td>
                                <td>
                                    @if($media->ref_table)
                                        <span class="badge" style="background-color: #20c997;">{{ $media->ref_table }}</span>
                                    @else
                                        <span class="badge bg-secondary">Umum</span>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted">{{ $media->mime_type ?? '-' }}</small>
                                </td>
                                <td>
                                    <small>{{ $media->sort_order }}</small>
                                </td>
                                <td>
                                    <small class="text-muted">{{ $media->created_at->format('d M Y') }}</small>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('media.edit', $media->media_id) }}" class="btn btn-sm btn-info text-white" style="background-color: #17a2b8; border: none;">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('media.destroy', $media->media_id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin hapus media ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <p class="text-muted mb-0">Belum ada media. <a href="{{ route('media.create') }}">Tambah media baru</a></p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($medias->hasPages())
            <div class="mt-4">
                {{ $medias->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
