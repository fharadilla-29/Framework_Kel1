@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid bg-light py-4">
    <div class="container py-4">
        <h1 class="display-4 text-success mb-3">Edit Produk</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produk</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Form Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow-lg" style="border: none; border-top: 4px solid #28a745;">
                    <div class="card-header" style="background-color: #28a745; color: white;">
                        <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Form Edit Produk</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label" style="font-weight: 600;">Nama Produk</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="Masukkan nama produk" style="border: 1px solid #ddd; border-radius: 4px;">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label" style="font-weight: 600;">Harga (Rp)</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="Masukkan harga produk" style="border: 1px solid #ddd; border-radius: 4px;" min="0">
                                @error('price')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label" style="font-weight: 600;">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Masukkan deskripsi produk" style="border: 1px solid #ddd; border-radius: 4px;">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success" style="background-color: #28a745; border: none; font-weight: 600;">
                                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                                </button>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary" style="border: none; font-weight: 600;">
                                    <i class="fas fa-times me-2"></i>Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form End -->
@endsection
