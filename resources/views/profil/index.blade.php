@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar_warga')
@endsection

@section('title', 'Profil Warga')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/profil.css') }}">
@endsection

@section('content')

<div class="profil-container">

    {{-- PROFIL --}}
    <div class="card profil-card">

        <div class="foto-wrapper">
            <img 
                src="{{ Auth::user()->foto ? asset('storage/foto_profil/' . Auth::user()->foto) : asset('images/default.png') }}"
                class="foto-profil"
            >

            <form action="{{ route('profil.update.photo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="uploadFoto" class="edit-icon">✏️</label>
                <input type="file" id="uploadFoto" name="foto" class="hidden" onchange="this.form.submit()">
            </form>
        </div>

        <h2 class="nama">{{ strtoupper(Auth::user()->name) }}</h2>

        <p class="email">{{ Auth::user()->email }}</p>
        <p class="telepon">No HP: {{ Auth::user()->phone ?? '-' }}</p>
        <p class="alamat">Alamat: {{ Auth::user()->address ?? '-' }}</p>

        <a href="{{ route('profil.edit') }}" class="btn-edit">Edit Profil</a>
    </div>


    {{-- LAPORAN --}}
    <div class="card laporan-card">
        <h3>Laporan Anda</h3>

        @if ($laporans->isEmpty())
            <p style="color:#555;">Belum ada laporan.</p>
        @else
            <ul class="list-laporan">
                @foreach ($laporans as $index => $lap)
                <li>
                    <span>{{ $index+1 }}. {{ $lap->judul }}</span>
                    <a href="{{ route('laporan.show', $lap->id_laporan) }}" class="btn-lihat">Lihat</a>
                </li>
                @endforeach
            </ul>
        @endif
    </div>


    {{-- KEAMANAN --}}
    <div class="card keamanan-card">
        <h3>Keamanan</h3>

        <p>Kata Sandi Anda</p>
        <div class="password-box">********</div>

        <a href="{{ route('profil.security') }}" class="btn-password">Ubah Kata Sandi</a>
    </div>

</div>

@endsection
