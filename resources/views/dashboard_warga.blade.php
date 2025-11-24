@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar_warga')
@endsection

@section('title', 'Dashboard Warga | Lapor RT')

@section('content')
<link rel="stylesheet" href="{{ asset('css/warga.css') }}">

<header class="header">
    <h2>Hai, {{ Auth::user()->name ?? 'Pengguna' }}</h2>
</header>

{{-- ===== MENU SECTION ===== --}}
<section class="menu-section">
    <h3>MENU</h3>

    <div class="menu-cards">

        <a href="{{ route('profil.index') }}" class="card card-link">
            <img src="{{ asset('images/profil.png') }}" alt="Profil" class="icon">
            <h4>Profil Anda</h4>
            <p>Lihat data profil serta biodata Anda</p>
        </a>


        <a href="{{ route('laporan.index') }}" class="card card-link">
            <img src="{{ asset('images/laporan.png') }}" class="icon" alt="Buat Laporan">
            <h4>Buat Laporan</h4>
            <p>Kirim laporan pengaduan ke RT</p>
        </a>

        <a href="{{ route('tutorial.index') }}" class="card card-link">
    <img src="{{ asset('images/tutorial.png') }}" alt="Tutorial" class="icon">
    <h4>Tutorial</h4>
    <p>Lihat tutorial cara membuat laporan</p>
</a>


        <a href="{{ route('informasi.index') }}" class="card card-link">
    <img src="{{ asset('images/info.png') }}" alt="Informasi" class="icon">
    <h4>Informasi</h4>
    <p>Lihat informasi seputar RT di sini</p>
</a>


    </div>
</section>

{{-- ===== LAPORAN SECTION ===== --}}
<section class="laporan-section">
    <h3>Laporan Anda</h3>
    <p>Klik salah satu laporan untuk melihat detail</p>

    @if($laporans->isEmpty())
        <p style="text-align: center; color: #555;">Belum ada laporan yang Anda kirim.</p>
    @else
        <div class="laporan-cards">
            @foreach($laporans as $laporan)
                <a href="{{ route('laporan.show', $laporan->id_laporan) }}" class="laporan-card-link">
                    <div class="laporan-card">

                        {{-- Foto Laporan --}}
                        @if ($laporan->foto)
                            <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto Laporan">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" alt="Foto Default">
                        @endif

                        {{-- Judul --}}
                        <h4>{{ $laporan->judul }}</h4>

                        {{-- Status --}}
                        <p>Status Laporan : <span>{{ ucfirst($laporan->status) }}</span></p>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</section>
@endsection
