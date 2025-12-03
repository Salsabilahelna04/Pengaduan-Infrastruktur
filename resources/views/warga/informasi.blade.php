@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar_warga')
@endsection

@section('title', 'Informasi | Lapor RT')

@section('content')
<link rel="stylesheet" href="{{ asset('css/informasi.css') }}">

<div class="header">
    <h2>INFORMASI</h2>
    <p>Informasi terkait tujuan, manfaat, dan cara kerja Website Lapor RT</p>
</div>

<div class="info-container">

    <div class="info-card">
      <h3>📌 Apa Itu Website Lapor RT?</h3>
      <p>
        Lapor RT adalah sistem informasi berbasis web yang dirancang untuk mempermudah masyarakat
        dalam melaporkan kerusakan infrastruktur seperti jalan, jembatan, saluran air, dan fasilitas umum lainnya.
        Website ini dibuat agar warga dapat menyampaikan laporan secara cepat, mudah, dan tanpa harus mendatangi kantor RT.
      </p>
    </div>

    <div class="info-card">
      <h3>🎯 Tujuan Dibuatnya Website</h3>
      <ul>
        <li>Mempermudah masyarakat melaporkan kerusakan infrastruktur kapan saja dan di mana saja.</li>
        <li>Meningkatkan transparansi dan efektivitas pelayanan publik di tingkat RT.</li>
        <li>Membantu perangkat desa dalam memprioritaskan laporan berdasarkan urgensi dan lokasi.</li>
        <li>Menyediakan sistem yang cepat, praktis, dan terdokumentasi rapi.</li>
      </ul>
    </div>

    <div class="info-card">
      <h3>🚨 Masalah yang Ingin Diselesaikan</h3>
      <ul>
        <li>Pengaduan manual yang lambat dan tidak efisien.</li>
        <li>Banyak laporan tidak tercatat dengan baik.</li>
        <li>Jam pelayanan terbatas membuat warga kesulitan melapor.</li>
        <li>Tidak adanya pelacakan status laporan secara waktu nyata.</li>
      </ul>
    </div>

    <div class="info-card jenis-wrapper">
    <h3>🗂️ Jenis Laporan yang Dapat Diajukan</h3>

    <div class="jenis-grid">

        <!-- FASILITAS UMUM -->
        <div class="jenis-card">
            <h4>🏛️ Fasilitas Umum</h4>
            <p>
                Fasilitas umum mencakup seluruh sarana dan prasarana fisik yang digunakan warga
                secara bersama. Laporan kategori ini membantu RT memantau kondisi infrastruktur
                lingkungan agar tetap layak, aman, dan nyaman digunakan oleh masyarakat.
            </p>

            <ul>
                <li>Jalan rusak atau berlubang</li>
                <li>Trotoar atau gorong-gorong rusak</li>
                <li>Saluran air/drainase rusak atau tidak berfungsi</li>
                <li>Lampu jalan mati (fungsi penerangan publik)</li>
                <li>Jembatan kecil lingkungan rusak</li>
                <li>Papan nama jalan/gang hilang atau rusak</li>
                <li>Pos ronda rusak secara fisik</li>
                <li>Fasilitas balai RT rusak (atap, cat, kursi, meja)</li>
            </ul>
        </div>

        <!-- KEBERSIHAN -->
        <div class="jenis-card">
            <h4>🧹 Kebersihan Lingkungan</h4>
            <p>
                Kategori kebersihan mencakup laporan yang berhubungan langsung dengan kondisi
                lingkungan yang bersih, sehat, dan bebas dari potensi sumber penyakit. Masalah
                kebersihan sangat penting untuk mencegah pencemaran, bau tidak sedap, dan risiko
                kesehatan warga.
            </p>

            <ul>
                <li>Sampah menumpuk di area tertentu</li>
                <li>Sampah liar (pembuangan ilegal)</li>
                <li>Saluran air tersumbat hingga mengeluarkan bau</li>
                <li>Bangkai hewan yang menimbulkan bau</li>
                <li>Limbah rumah tangga meluber ke jalan</li>
                <li>TPS penuh atau tidak diangkut</li>
                <li>Genangan air yang berpotensi menjadi sarang nyamuk</li>
            </ul>
        </div>

        <!-- KEAMANAN -->
        <div class="jenis-card">
            <h4>🔒 Keamanan Lingkungan</h4>
            <p>
                Keamanan lingkungan berhubungan dengan sarana yang mendukung keselamatan warga.
                Infrastruktur keamanan yang bermasalah dapat meningkatkan risiko kriminalitas,
                kecelakaan, atau kondisi rawan lainnya. Karena itu kategori ini dibuat terpisah
                agar laporan keamanan dapat segera diprioritaskan oleh RT.
            </p>

            <ul>
                <li>CCTV lingkungan rusak atau tidak berfungsi</li>
                <li>Lampu gang/lampu area rawan mati sehingga lokasi menjadi gelap</li>
                <li>Pagar lingkungan rusak dan berpotensi menimbulkan risiko</li>
                <li>Rambu peringatan hilang atau rusak (contoh: jalan licin, tikungan tajam)</li>
                <li>Penutup drainase hilang sehingga membahayakan pengguna jalan</li>
                <li>Area gelap yang berpotensi terjadi tindak kriminal</li>
                <li>Pos ronda tidak layak pakai untuk keamanan warga</li>
            </ul>
        </div>

    </div>
</div>


    <div class="info-card">
      <h3>⚙️ Fitur Utama Website</h3>
      <ul>
        <li>Mengirim laporan kerusakan beserta foto.</li>
        <li>Tracking status laporan: diajukan → verifikasi → proses → selesai / tolak.</li>
        <li>Dashboard admin RT untuk mengelola laporan.</li>
        <li>Notifikasi email otomatis.</li>
        <li>Penentuan prioritas laporan berdasarkan tingkat kerusakan.</li>
      </ul>
    </div>

    <div class="info-card">
      <h3>🔄 Cara Kerja Sistem</h3>
      <p>
        Warga mengirim laporan → RT menerima & memverifikasi → RT memproses laporan →
        laporan selesai atau ditolak → warga mendapat notifikasi. Semua langkah tercatat
        otomatis untuk memastikan transparansi dan akuntabilitas.
      </p>
    </div>

</div>

@endsection
