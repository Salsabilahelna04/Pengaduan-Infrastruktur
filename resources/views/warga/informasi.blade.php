@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar_warga')
@endsection

@section('title', 'Informasi | Lapor RT')

@section('navbar')
    @include('layouts.navbar_warga')
@endsection

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

    <div class="info-card">
      <h3>⚙️ Fitur Utama Website</h3>
      <ul>
        <li>Mengirim laporan kerusakan beserta foto.</li>
        <li>Tracking status laporan: diajukan → diproses → selesai.</li>
        <li>Dashboard admin RT untuk mengelola laporan.</li>
        <li>Notifikasi email otomatis.</li>
        <li>Prioritas laporan berdasarkan tingkat kerusakan.</li>
      </ul>
    </div>

    <div class="info-card">
      <h3>🔄 Cara Kerja Sistem</h3>
      <p>
        Warga mengirim laporan → RT menerima & memverifikasi → RT memproses laporan →
        laporan selesai → warga mendapat notifikasi. Setiap langkah tercatat otomatis
        untuk memastikan transparansi dan akuntabilitas.
      </p>
    </div>

</div>

@endsection
