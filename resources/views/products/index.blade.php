@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid bg-light py-4">
    <div class="container py-4">
        <h1 class="display-4 text-success mb-3">Manajemen Produk</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active">Produk</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Products Content Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Add Button -->
        <div class="mb-4">
            <a href="{{ route('products.create') }}" class="btn text-white" style="background-color: #28a745; font-weight: 600;">
                <i class="fas fa-plus me-2"></i>Tambah Produk
            </a>
        </div>

        @if($products->count() > 0)
            <div class="card shadow-lg" style="border: none; border-top: 4px solid #28a745;">
                <div class="card-header" style="background-color: #28a745; color: white;">
                    <h5 class="mb-0"><i class="fas fa-list me-2"></i>Daftar Produk ({{ $products->count() }})</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead style="background-color: #f9f9f9;">
                            <tr>
                                <th style="width: 5%; text-align: center;">#</th>
                                <th style="width: 35%;">Nama Produk</th>
                                <th style="width: 15%; text-align: right;">Harga</th>
                                <th style="width: 30%;">Deskripsi</th>
                                <th style="width: 15%; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key => $product)
                                <tr>
                                    <td style="text-align: center; vertical-align: middle;">{{ $key + 1 }}</td>
                                    <td style="vertical-align: middle;">
                                        <strong style="color: #28a745;">{{ $product->name }}</strong>
                                    </td>
                                    <td style="text-align: right; vertical-align: middle;">
                                        <span style="background-color: #e8f5e9; padding: 5px 10px; border-radius: 4px; font-weight: 600;">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <small style="color: #666;">{{ Str::limit($product->description ?? 'Tidak ada deskripsi', 60, '...') }}</small>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="alert alert-info text-center" role="alert">
                <i class="fas fa-info-circle me-2"></i>Belum ada produk. <a href="{{ route('products.create') }}" class="alert-link">Tambahkan sekarang</a>
            </div>
        @endif
    </div>
</div>
<!-- Products Content End -->
@endsection
