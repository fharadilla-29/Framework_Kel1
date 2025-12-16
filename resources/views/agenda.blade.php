@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid bg-light py-4">
    <div class="container py-4">
        <h1 class="display-4 text-success mb-3">Agenda Kegiatan</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Agenda</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Agenda Content Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <!-- Add Button for Admin -->
        @if(Auth::check())
            <div class="mb-4">
                <a href="{{ route('agenda.create') }}" class="btn btn-success" style="background-color: #28a745; border: none; font-weight: 600;">
                    <i class="fas fa-plus me-2"></i>Tambah Agenda
                </a>
            </div>
        @endif

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($agendas->isEmpty())
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>Belum ada agenda kegiatan.
            </div>
        @else
            <div class="row g-5">
                @foreach($agendas as $agenda)
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div style="background-color: #f9f9f9; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); position: relative;">
                            <div style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); padding: 20px; color: white; position: relative;">
                                <h6 style="margin: 0; font-weight: 600;">📅 Agenda Kegiatan</h6>
                                
                                <!-- Admin Edit/Delete Buttons -->
                                @if(Auth::check())
                                    <div style="position: absolute; top: 10px; right: 10px; display: flex; gap: 8px;">
                                        <a href="{{ route('agenda.edit', $agenda->id) }}" class="btn btn-light btn-sm" style="padding: 6px 10px; font-size: 0.85rem;">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('agenda.destroy', $agenda->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin hapus agenda ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="padding: 6px 10px; font-size: 0.85rem;">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="p-4">
                                <h5 class="text-dark mb-3" style="font-weight: 700;">{{ $agenda->judul }}</h5>
                                
                                <!-- Media Gallery -->
                                @if($agenda->medias && $agenda->medias->count() > 0)
                                    <div style="margin-bottom: 15px; display: flex; gap: 8px; flex-wrap: wrap;">
                                        @foreach($agenda->medias as $media)
                                            @php
                                                $isImage = in_array($media->mime_type, ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml']);
                                            @endphp
                                            @if($isImage)
                                                <img src="{{ asset('storage/' . $media->file_url) }}" alt="Media" style="width: 80px; height: 80px; border-radius: 4px; object-fit: cover; border: 2px solid #28a745;">
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                                
                                <div style="margin-bottom: 15px;">
                                    <p style="color: #666; margin: 5px 0;"><strong>📍 Lokasi:</strong> {{ $agenda->lokasi }}</p>
                                    <p style="color: #666; margin: 5px 0;"><strong>📅 Tanggal:</strong> {{ \Carbon\Carbon::parse($agenda->tanggal)->format('d F Y') }}</p>
                                    <p style="color: #666; margin: 5px 0;"><strong>⏰ Waktu:</strong> {{ $agenda->waktu_mulai }}{{ $agenda->waktu_selesai ? ' - ' . $agenda->waktu_selesai : '' }} WIB</p>
                                    @if($agenda->penyelenggara)
                                        <p style="color: #666; margin: 5px 0;"><strong>👥 Penyelenggara:</strong> {{ $agenda->penyelenggara }}</p>
                                    @endif
                                </div>
                                @if($agenda->deskripsi)
                                    <p style="color: #666; line-height: 1.6; margin-bottom: 15px;">{{ Str::limit($agenda->deskripsi, 100) }}</p>
                                @endif
                                <a href="#" class="btn btn-success btn-sm" style="background-color: #28a745; border: none;">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
<!-- Agenda Content End -->

@endsection
