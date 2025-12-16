@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg" style="border: none; border-top: 4px solid #28a745;">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="text-dark" style="font-weight: 700;">Login</h2>
                        <p class="text-muted">Masukkan kredensial Anda untuk mengakses sistem</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> <strong>Login Gagal!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" 
                                   placeholder="Masukkan email Anda" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" 
                                   placeholder="Masukkan password Anda" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Ingat saya
                            </label>
                        </div>

                        <button type="submit" class="btn w-100 text-white" style="background-color: #28a745; font-weight: 600; padding: 10px; border-radius: 5px;">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </button>
                    </form>

                    <div class="mt-4 text-center">
                        <p class="text-muted">Belum punya akun? <a href="#" style="color: #28a745; text-decoration: none;">Hubungi admin</a></p>
                    </div>

                    <hr>

                    <div class="text-center">
                        <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Kembali ke Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
