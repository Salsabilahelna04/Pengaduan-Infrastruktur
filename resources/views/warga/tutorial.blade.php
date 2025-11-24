@extends('layouts.app')


@section('navbar')
    @include('layouts.navbar_warga')
@endsection

@section('title', 'Tutorial | Lapor RT')

@section('navbar')
    @include('layouts.navbar_warga')
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/tutorial.css') }}">

<div class="header">
    <h2>TUTORIAL</h2>
    <p>Langkah - Langkah Mengirim Laporan</p>
</div>

<div class="tutorial-container">

    <div class="step-card">
        <div class="step-number">1</div>
        <p><b>Di Landing Page</b>, klik <b>Lapor Sekarang</b> atau <b>Pelajari Lebih Lanjut</b>.</p>
        <img src="{{ asset('images/Cuplikan layar 2025-11-19 194317.png') }}" alt="Langkah 1">
    </div>

    <div class="step-card">
        <div class="step-number">2</div>
        <p>Masuk menggunakan akun Anda atau daftar terlebih dahulu jika belum punya akun.</p>
        <img src="{{ asset('images/Cuplikan layar 2025-11-19 194341_Cuplikan layar 2025-11-19 194329 (1).jpeg') }}" alt="Langkah 2">
    </div>


    <div class="step-card">
        <div class="step-number">3</div>
        <p>Dihalaman dashboard, masuk kebagian Buat Laporan</p>
        <img src="{{ asset('images/Cuplikan layar 2025-11-19 194409.png') }}" alt="Langkah 2">
    </div>

    <div class="step-card">
        <div class="step-number">4</div>
        <p>Isi semua detail laporan sesuai keadaan yang terjadi.</p>
        <img src="{{ asset('images/Cuplikan layar 2025-11-19 194421.png') }}" alt="Langkah 3">
    </div>

    <div class="step-card">
        <div class="step-number">5</div>
        <p>Setelah klik kirim, Anda akan menerima pop up bahwa laporan berhasil dikirim.</p>
        <img src="{{ asset('images/Cuplikan layar 2025-11-19 194550.png') }}" alt="Langkah 4">
    </div>

    <div class="step-card">
        <div class="step-number">6</div>
        <p>Laporan yang sudah dikirim akan muncul di halaman Home.</p>
        <img src="{{ asset('images/Cuplikan layar 2025-11-19 194634.png') }}" alt="Langkah 5">
    </div>

</div>

@endsection
