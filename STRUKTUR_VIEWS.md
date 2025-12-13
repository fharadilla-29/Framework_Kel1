# Struktur Views BinaDesa Guest

## Layout Utama
- **layouts/app.blade.php** - Template HTML utama dengan head, body, scripts

## Partials (Di resources/views/partials/)

### Komponen Utama
1. **spinner.blade.php** - Loading spinner saat page load
2. **navbar.blade.php** - Navigation bar dan menu utama
3. **hero.blade.php** - Carousel/Hero section
4. **search-modal.blade.php** - Modal untuk search bar

### Section Konten
5. **feature.blade.php** - Fitur-fitur layanan (Quality Check, Filtration, dll)
6. **about.blade.php** - Bagian About Us dengan gambar dan deskripsi
7. **counter.blade.php** - Statistik/Counter (Happy Clients, Transport, dll)
8. **service.blade.php** - Layanan-layanan yang ditawarkan
9. **product.blade.php** - Produk-produk yang dijual
10. **blog.blade.php** - Blog dan berita terbaru
11. **team.blade.php** - Tim perusahaan
12. **testimonial.blade.php** - Testimoni dari klien

### Footer
13. **footer.blade.php** - Footer dengan newsletter subscription dan links
14. **copyright.blade.php** - Copyright dan credits
15. **back-to-top.blade.php** - Tombol untuk kembali ke atas

## Home View
**home.blade.php** - Main page yang menggunakan extends dari layout.app dan include semua partials

## Keuntungan Struktur Ini:
✅ Kode lebih terorganisir dan mudah dipelihara
✅ Setiap section bisa di-edit secara independen
✅ Mudah untuk reuse components di halaman lain
✅ Lebih scalable untuk project yang berkembang
✅ Separation of concerns (SoC)
