<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Volt - Edit Pelanggan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta name="author" content="Themesberg">

    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets-admin/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets-admin/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets-admin/img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets-admin/img/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('assets-admin/img/favicon/safari-pinned-tab.svg')}}" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <link type="text/css" href="{{asset('assets-admin/css/volt.css') }}" rel="stylesheet">

</head>

<body>

    {{-- Bagian Navigasi dan Sidebar tidak diubah --}}
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="#">
            <img class="navbar-brand-dark" src="{{ asset('assets-admin/img/brand/light.svg') }}" alt="Volt logo" /> <img class="navbar-brand-light" src="{{ asset('') }}assets-admin/img/brand/dark.svg" alt="Volt logo" />
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
       {{-- ... Konten Sidebar ... --}}
    </nav>

    <main class="content">

        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
           {{-- ... Konten Top Nav ... --}}
        </nav>

        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}">Pelanggan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Pelanggan</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Edit Pelanggan</h1>
                    <p class="mb-0">Form untuk mengubah data pelanggan.</p>
                </div>
                <div>
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <form action="{{ route('pelanggan.update', $dataPelanggan->pelanggan_id) }}" method="POST">
                            @csrf
                            @method('PUT') {{-- PENTING: Method spoofing untuk update --}}

                            <div class="row mb-4">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">First name</label>
                                        {{-- Menambahkan 'value' untuk menampilkan data yang ada --}}
                                        <input type="text" id="first_name" name="first_name" class="form-control" value="{{ $dataPelanggan->first_name }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last name</label>
                                        {{-- Menambahkan 'value' --}}
                                        <input type="text" id="last_name" name="last_name" class="form-control" value="{{ $dataPelanggan->last_name }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6">
                                    <div class="mb-3">
                                        <label for="birthday" class="form-label">Birthday</label>
                                        {{-- Menambahkan 'value' --}}
                                        <input type="date" id="birthday" name="birthday" class="form-control" value="{{ $dataPelanggan->birthday }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select id="gender" name="gender" class="form-select">
                                            {{-- Menambahkan kondisi 'selected' untuk memilih gender yang sesuai --}}
                                            <option value="Male" @if($dataPelanggan->gender == 'Male') selected @endif>Male</option>
                                            <option value="Female" @if($dataPelanggan->gender == 'Female') selected @endif>Female</option>
                                            <option value="Other" @if($dataPelanggan->gender == 'Other') selected @endif>Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        {{-- Menambahkan 'value' --}}
                                        <input type="email" id="email" name="email" class="form-control" value="{{ $dataPelanggan->email }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        {{-- Menambahkan 'value' --}}
                                        <input type="text" id="phone" name="phone" class="form-control" value="{{ $dataPelanggan->phone }}">
                                    </div>

                                    <div class="">
                                        {{-- Mengubah teks tombol --}}
                                        <button type="submit" class="btn btn-primary">Update Data</button>
                                        <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{-- ================= AKHIR FORM ================= --}}
                    </div>
                </div>
            </div>
        </div>

        <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
            {{-- ... Konten Footer ... --}}
        </footer>
    </main>

    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>
</body>

</html>
