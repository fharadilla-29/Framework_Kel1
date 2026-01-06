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
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        min-width: 160px;
        padding: 0.5rem 0;
        margin: 0.125rem 0 0;
        font-size: 1rem;
        color: #212529;
        text-align: left;
        list-style: none;
        background-clip: padding-box;
        border: 1px solid rgba(0,0,0,.15);
    }

    .navbar-custom .dropdown-menu.show {
        display: block;
    }

    .navbar-custom .dropdown-item {
        color: #333;
        font-size: 13px;
        padding: 10px 20px !important;
        cursor: pointer;
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('visi-misi') || request()->is('identitas-desa') || request()->is('kontak-kantor') ? 'active' : '' }}" href="#" id="profilDesa" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profil Desa</a>
                    <ul class="dropdown-menu" aria-labelledby="profilDesa">
                        <li><a class="dropdown-item" href="{{ url('/visi-misi') }}">Visi Misi</a></li>
                        <li><a class="dropdown-item" href="{{ url('/identitas-desa') }}">Identitas Desa</a></li>
                        <li><a class="dropdown-item" href="{{ url('/kontak-kantor') }}">Kontak Kantor</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('berita/*') ? 'active' : '' }}" href="#" id="beritaDrop" role="button" data-bs-toggle="dropdown" aria-expanded="false">Berita</a>
                    <ul class="dropdown-menu" aria-labelledby="beritaDrop">
                        @php
                            $kategoriList = \App\Models\KategoriBerita::all();
                        @endphp
                        @forelse($kategoriList as $kat)
                            <li><a class="dropdown-item" href="{{ url('/berita/' . $kat->slug) }}">{{ $kat->nama }}</a></li>
                        @empty
                            <li><a class="dropdown-item" href="#">Belum ada kategori</a></li>
                        @endforelse
                    </ul>
                </li>
                <a href="{{ url('/agenda') }}" class="nav-link {{ request()->is('agenda') ? 'active' : '' }}">Agenda</a>
                <a href="{{ url('/galeri') }}" class="nav-link {{ request()->is('galeri') ? 'active' : '' }}">Galeri</a>
                @if(Auth::check())
                    <a href="{{ route('products.index') }}" class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}">
                        <i class="fas fa-box"></i> Produk
                    </a>
                @endif
</nav>


