<!-- Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5">
        <div class="row g-5 mb-5 align-items-center">
            <div class="col-lg-7">
                <div class="position-relative mx-auto">
                    <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Email address to Subscribe">
                    <button type="button" class="btn btn-secondary rounded-pill position-absolute top-0 end-0 py-2 px-4 mt-2 me-2">Subscribe</button>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="d-flex align-items-center justify-content-center justify-content-lg-end">
                    <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-secondary btn-md-square rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <div class="footer-item">
                        <h3 class="text-white mb-4"><i class="fas fa-leaf text-success me-3"></i>{{ $profil->nama_desa ?? 'Desa Teso Nilo' }}</h3>
                        <p class="mb-3">Desa di {{ $profil->kabupaten ?? 'Kabupaten' }}, {{ $profil->provinsi ?? 'Provinsi' }}. Bersama membangun desa yang maju, mandiri, dan berkelanjutan untuk kehidupan masyarakat yang sejahtera.</p>
                    </div>
                    <div class="position-relative">
                        <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                        <button type="button" class="btn btn-secondary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-white mb-4">Menu Utama</h4>
                    <a href="{{ url('/home') }}"><i class="fas fa-angle-right me-2"></i> Beranda</a>
                    <a href="{{ url('/visi-misi') }}"><i class="fas fa-angle-right me-2"></i> Visi Misi</a>
                    <a href="{{ url('/identitas-desa') }}"><i class="fas fa-angle-right me-2"></i> Identitas Desa</a>
                    <a href="{{ url('/agenda') }}"><i class="fas fa-angle-right me-2"></i> Agenda</a>
                    <a href="{{ url('/galeri') }}"><i class="fas fa-angle-right me-2"></i> Galeri</a>
                    <a href="{{ url('/kontak-kantor') }}"><i class="fas fa-angle-right me-2"></i> Kontak</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-white mb-4">Jam Operasional</h4>
                    <div class="mb-3">
                        <h6 class="text-muted mb-0">Senin - Jumat:</h6>
                        <p class="text-white mb-0">08.00 - 16.00 WIB</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="text-muted mb-0">Sabtu:</h6>
                        <p class="text-white mb-0">08.00 - 12.00 WIB</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="text-muted mb-0">Libur:</h6>
                        <p class="text-white mb-0">Minggu & Hari Besar Nasional</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-white mb-4">Kontak Kantor</h4>
                    <a href="#"><i class="fa fa-map-marker-alt me-2"></i> {{ $profil->alamat_kantor ?? 'Alamat Kantor' }}</a>
                    <a href="mailto:{{ $profil->email ?? 'email@desa.com' }}"><i class="fas fa-envelope me-2"></i> {{ $profil->email ?? 'email@desa.com' }}</a>
                    <a href="mailto:{{ $profil->email ?? 'email@desa.com' }}"><i class="fas fa-envelope me-2"></i> {{ $profil->email ?? 'email@desa.com' }}</a>
                    <a href="tel:{{ $profil->telepon ?? '+62-123-456' }}"><i class="fas fa-phone me-2"></i> {{ $profil->telepon ?? '+62-123-456' }}</a>
                    <a href="tel:{{ $profil->telepon ?? '+62-123-456' }}" class="mb-3"><i class="fas fa-print me-2"></i> {{ $profil->telepon ?? '+62-123-456' }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
