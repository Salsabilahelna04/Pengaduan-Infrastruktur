@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar_landing')
@endsection

@section('title', 'Layanan Pengaduan Infrastruktur RT')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

{{-- ===== HERO SECTION ===== --}}
<section class="hero">
    <div class="overlay">
        <div class="hero-content">
            <h1>LAYANAN PENGADUAN<br>INFRASTRUKTUR RT</h1>
            <p>
                Sampaikan laporan permasalahan infrastruktur di lingkungan Anda dengan cepat, mudah, dan transparan.
            </p>
            <div class="hero-buttons">
                <a href="{{ route('login') }}" class="btn-primary">Laporkan Sekarang</a>
                <a href="#fitur" class="btn-outline">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </div>
</section>

{{-- ===== WHY SECTION ===== --}}
<<section class="why-section" id="why">
    <div class="container">
        <h2>Mengapa Memilih Layanan Pengaduan RT?</h2>
        <p>Kami hadir untuk memastikan setiap laporan masyarakat ditangani dengan cepat dan transparan oleh pengurus RT.</p>

        <div class="why-cards">
            <div class="why-card">
                <img src="{{ asset('images/cepat.png') }}" alt="Cepat">
                <h4>Respon Cepat</h4>
                <p>Laporan Anda segera ditinjau oleh petugas RT dalam waktu singkat.</p>
            </div>
            <div class="why-card">
                <img src="{{ asset('images/transparan.png') }}" alt="Transparan">
                <h4>Proses Transparan</h4>
                <p>Anda dapat memantau status laporan secara real-time melalui dashboard warga.</p>
            </div>
            <div class="why-card">
                <img src="{{ asset('images/percaya.png') }}" alt="Terpercaya">
                <h4>Terpercaya</h4>
                <p>Dikelola langsung oleh pengurus RT setempat, menjamin keaslian data laporan.</p>
            </div>
        </div>
    </div>
</section>

{{-- ===== FAMILY PHOTO SECTION (Dipindah ke bawah WHY) ===== --}}
<section class="family-section">
    <div class="family-overlay">
        <div class="family-content">
            <span class="tag">Keharmonisan Warga</span>
            <h2>Keluarga Bahagia adalah Fondasi Lingkungan yang Baik</h2>
            <p>Kami mendukung terciptanya lingkungan yang aman, nyaman, dan penuh kebersamaan.</p>
        </div>
    </div>
</section>

{{-- ===== STEPS SECTION ===== --}}
<section class="steps-section" id="fitur">
    <div class="container">
        <h2>Bagaimana Cara Melapor?</h2>

        <div class="steps-container">
            <div class="step-card">
                <img src="{{ asset('images/laporan.png') }}" alt="Buat Laporan">
                <h4>Buat Laporan</h4>
                <p>Tulislah laporan Anda dengan lengkap dan jelas.</p>
            </div>

            <div class="step-card">
                <img src="{{ asset('images/verif.png') }}" alt="Proses Verifikasi">
                <h4>Proses Verifikasi</h4>
                <p>Laporan Anda akan diverifikasi oleh pihak RT.</p>
            </div>

            <div class="step-card">
                <img src="{{ asset('images/tindak.png') }}" alt="Tindak Lanjut">
                <h4>Tindak Lanjut</h4>
                <p>Petugas RT akan melakukan tindakan sesuai laporan Anda.</p>
            </div>

            <div class="step-card">
                <img src="{{ asset('images/selesai.png') }}" alt="Selesai">
                <h4>Selesai</h4>
                <p>Laporan Anda diselesaikan dan dapat dievaluasi bersama.</p>
            </div>
        </div>
    </div>
</section>

{{-- ===== STATS SECTION ===== --}}
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat">
                <h3>1.2K+</h3>
                <p>Laporan Terselesaikan</p>
            </div>
            <div class="stat">
                <h3>25+</h3>
                <p>RT Bergabung</p>
            </div>
            <div class="stat">
                <h3>4.9⭐</h3>
                <p>Tingkat Kepuasan</p>
            </div>
            <div class="stat">
                <h3>24/7</h3>
                <p>Dukungan Warga</p>
            </div>
        </div>
    </div>
</section>

{{-- ===== CONTACT US SECTION (NEW STYLE) ===== --}}
<section class="contact-footer">
    <div class="footer-container">

        {{-- BRAND SECTION --}}
        <div class="footer-brand">
            <h2 class="brand-title">Layanan RT</h2>
            <p class="brand-desc">
                Sistem pengaduan infrastruktur RT untuk lingkungan yang lebih aman,
                nyaman, dan transparan.
            </p>
        </div>

        {{-- QUICK LINKS --}}
<div class="footer-links">
    <h4>Quick Links</h4>
    <ul>
        <li><a href="#">Beranda</a></li>
        <li><a href="#fitur">Cara Melapor</a></li>
        <li><a href="#why">Mengapa Memilih Kami</a></li>
        <li><a href="/laporan">Buat Laporan</a></li>
   
    </ul>
</div>


        {{-- INFORMATION --}}
        <div class="footer-info">
            <h4>Informasi</h4>

            <p class="info-item">
                📞 <span>+62 812-3456-7890</span>
            </p>

            <p class="info-item">
                ✉️ <span>infrastrukturlayanan@gmail.com</span>
            </p>

            <p class="info-item">
                📍 <span>Kota Jambi, Jambi</span>
            </p>

            <h4 class="open-title">Jam Operasional</h4>
            <p class="open-item">Senin - Sabtu : 08.00 - 20.00</p>
            <p class="open-item">Minggu : 09.00 - 23.00</p>
        </div>

    </div>

    <div class="footer-bottom">
        <p>© 2025 Layanan Pengaduan RT — All Rights Reserved</p>
    </div>
</section>



@endsection
