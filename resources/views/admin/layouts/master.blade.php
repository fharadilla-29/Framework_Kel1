<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Panel')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('kaiadmin/assets/img/favicon.png') }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('kaiadmin/assets/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('kaiadmin/assets/css/fonts.css') }}">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('kaiadmin/assets/css/kaiadmin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('kaiadmin/assets/css/plugins.min.css') }}">
    @yield('styles')
</head>
<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('kaiadmin/assets/img/kaiadmin/logo_dark.png') }}" alt="loader">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader End -->

    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">
                <a href="{{ route('admin.dashboard') }}" class="logo">
                    <img src="{{ asset('kaiadmin/assets/img/kaiadmin/logo_light.png') }}" alt="logo" class="navbar-brand" width="150">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fas fa-bars"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="fas fa-ellipsis-v"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
                <div class="container-fluid">
                    <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1">
                                        <i class="fas fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Cari sesuatu..." class="form-control">
                            </div>
                        </form>
                    </div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                                <i class="fas fa-search"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ asset('kaiadmin/assets/img/profile.jpg') }}" alt="Admin" class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img src="{{ asset('kaiadmin/assets/img/profile.jpg') }}" alt="image profile" class="avatar-img rounded"></div>
                                            <div class="u-text">
                                                <h4>Admin</h4>
                                                <p class="text-muted">admin@example.com</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Profil Saya</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Pengaturan Akun</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="fas fa-power-off"></i> Keluar</a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="{{ asset('kaiadmin/assets/img/profile.jpg') }}" alt="Admin" class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    Admin
                                    <span class="user-level">Administrator</span>
                                    <span class="caret"></span>
                                </span>
                            </a>
                            <div class="clearfix"></div>

                            <div class="collapse in" id="collapseExample">
                                <ul class="nav">
                                    <li>
                                        <a href="#profile">
                                            <span class="link-collapse">Profil Saya</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#settings">
                                            <span class="link-collapse">Pengaturan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        <li class="nav-item active">
                            <a href="{{ route('admin.dashboard') }}" class="collapsed">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#news">
                                <i class="fas fa-newspaper"></i>
                                <p>Manajemen Berita</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="news">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ route('admin.news.index') }}">
                                            <span class="sub-item">Semua Berita</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.news.create') }}">
                                            <span class="sub-item">Tambah Berita</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#categories">
                                <i class="fas fa-tags"></i>
                                <p>Kategori</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="categories">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ route('admin.categories.index') }}">
                                            <span class="sub-item">Semua Kategori</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.categories.create') }}">
                                            <span class="sub-item">Tambah Kategori</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}">
                                <i class="fas fa-users"></i>
                                <p>Pengguna</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.settings') }}">
                                <i class="fas fa-cog"></i>
                                <p>Pengaturan</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white pb-2 fw-bold">@yield('page-title', 'Admin Dashboard')</h2>
                                <h5 class="text-white op-7 mb-2">
                                    <a href="{{ route('admin.dashboard') }}" class="text-white">Home</a>
                                    @yield('breadcrumbs')
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">
                    <!-- Content Area -->
                    @yield('content')
                </div>
            </div>
            
            <!-- Footer -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright ml-auto">
                        © {{ date('Y') }} Portal Berita. All rights reserved.
                    </div>
                </div>
            </footer>
            <!-- End Footer -->
        </div>
    </div>

    <!-- jquery-->
    <script src="{{ asset('kaiadmin/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('kaiadmin/assets/js/core/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('kaiadmin/assets/js/core/bootstrap.min.js') }}"></script>
    <!-- jQuery Scrollbar -->
    <script src="{{ asset('kaiadmin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('kaiadmin/assets/js/plugin/chart.js/chart.min.js') }}"></script>
    <!-- jQuery Sparkline -->
    <script src="{{ asset('kaiadmin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('kaiadmin/assets/js/kaiadmin.min.js') }}</script>
    @yield('scripts')
</body>
</html>
