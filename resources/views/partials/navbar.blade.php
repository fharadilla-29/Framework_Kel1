<!-- Navbar & Hero Start -->
<style>
    .navbar-custom {
        background-color: transparent !important;
        padding: 0 !important;
        box-shadow: none;
        position: sticky;
        top: 0;
        z-index: 1000;
        width: 100%;
        margin: 0;
    }

    .navbar-custom .navbar-brand {
        margin-right: 40px !important;
        padding: 10px 20px !important;
        border-radius: 0 0 8px 0;
    }

    .navbar-custom .nav-link {
        color: #28a745 !important;
        font-weight: 700;
        font-size: 14px;
        position: relative;
        margin: 0 15px !important;
        padding: 25px 0 !important;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    }

    .navbar-custom .nav-link:hover,
    .navbar-custom .nav-link.active {
        color: white !important;
    }

    .navbar-custom .nav-link::after {
        content: '';
        position: absolute;
        bottom: 20px;
        left: 0;
        width: 0;
        height: 3px;
        background-color: white;
        transition: width 0.3s ease;
    }

    .navbar-custom .nav-link:hover::after,
    .navbar-custom .nav-link.active::after {
        width: 100%;
    }

    .navbar-custom .dropdown-toggle::after {
        border-top-color: #28a745 !important;
        margin-left: 5px;
    }

    .navbar-custom .dropdown-menu {
        border: none;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        background-color: #ffffff;
    }

    .navbar-custom .dropdown-item {
        color: #333;
        font-size: 13px;
        padding: 10px 20px;
    }

    .navbar-custom .dropdown-item:hover {
        background-color: #f0f0f0;
        color: #28a745;
    }

    .navbar-custom .logout-btn {
        color: #28a745 !important;
        font-weight: 500;
        font-size: 16px;
        padding: 25px 20px !important;
        margin: 0 !important;
        cursor: pointer;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    }

    .navbar-custom .logout-btn:hover {
        color: white !important;
    }

    .navbar-custom .container-lg {
        width: 100%;
        padding-left: 0;
        padding-right: 0;
        max-width: 100%;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light navbar-custom" style="background: linear-gradient(to bottom, rgba(0,0,0,0.3), transparent) !important;">
    <div class="container-fluid px-4">
        <a href="{{ url('/home') }}" class="navbar-brand p-0" style="display: block; line-height: 0; margin-right: 50px !important;">
            <img src="{{ asset('template/img/Logo.jpg') }}" alt="Logo Desa" style="height: 60px !important; width: 60px !important; border-radius: 50% !important; object-fit: cover !important; display: block !important;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars" style="color: #ffc107;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="{{ url('/home') }}" class="nav-link {{ request()->is('/home') || request()->is('/') ? 'active' : '' }}">Beranda</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ request()->is('visi-misi') || request()->is('identitas-desa') || request()->is('kontak-kantor') ? 'active' : '' }}" data-bs-toggle="dropdown">Profil Desa</a>
                    <div class="dropdown-menu">
                        <a href="{{ url('/visi-misi') }}" class="dropdown-item">Visi Misi</a>
                        <a href="{{ url('/identitas-desa') }}" class="dropdown-item">Identitas Desa</a>
                        <a href="{{ url('/kontak-kantor') }}" class="dropdown-item">Kontak Kantor</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ request()->is('berita/*') ? 'active' : '' }}" data-bs-toggle="dropdown">Berita</a>
                    <div class="dropdown-menu">
                        <a href="{{ url('/berita/pemerintahan') }}" class="dropdown-item">Pemerintahan</a>
                        <a href="{{ url('/berita/wisata') }}" class="dropdown-item">Wisata & Alam</a>
                        <a href="{{ url('/berita/kabar-warga') }}" class="dropdown-item">Kabar Warga</a>
                        <a href="{{ url('/berita/ekonomi') }}" class="dropdown-item">Ekonomi Desa</a>
                        <a href="{{ url('/berita/layanan-publik') }}" class="dropdown-item">Layanan Publik</a>
                    </div>
                </div>
                <a href="{{ url('/agenda') }}" class="nav-link {{ request()->is('agenda') ? 'active' : '' }}">Agenda</a>
                <a href="{{ url('/galeri') }}" class="nav-link {{ request()->is('galeri') ? 'active' : '' }}">Galeri</a>
                @if(Auth::check())
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class=></i> Dashboard
                    </a>
                    <button type="button" class="logout-btn" style="border: none; background: none; padding: 25px 20px !important; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                @else
                    <a href="{{ route('login') }}" class="logout-btn"><i class="fas fa-sign-in-alt"></i></a>
                @endif
</nav>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #28a745; color: white; border: none;">
                <h5 class="modal-title" id="logoutModalLabel">
                    <i class="fas fa-sign-out-alt me-2"></i>Konfirmasi Logout
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Apakah Anda yakin ingin keluar dari akun ini?</p>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #dee2e6;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Batal
                </button>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
