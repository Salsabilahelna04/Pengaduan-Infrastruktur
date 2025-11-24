@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar_warga')
@endsection

@section('title', 'Profil Saya | Lapor RT')

@section('content')
<link rel="stylesheet" href="{{ asset('css/profil.css') }}">

<header class="header">
    <h2>Hai, {{ Auth::user()->name }}</h2>
</header>

<main class="profile-container">

    {{-- ===== LEFT CARD ===== --}}
    <section class="profile-card">
        <div class="profile-img">
            <img src="{{ Auth::user()->foto ? asset('storage/'.Auth::user()->foto) : asset('images/default-profile.jpg') }}" alt="Foto Profil">
            <a href="{{ route('profil.edit') }}" class="edit-icon">✏️</a>
        </div>

        <h2>{{ Auth::user()->name }}</h2>
        <a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
        <p>{{ Auth::user()->telepon ?? '-' }}</p>

        <a href="{{ route('profil.edit') }}" class="btn-primary">Edit Profil</a>
    </section>

    {{-- ===== RIGHT SECTION ===== --}}
    <div class="right-section">

        {{-- LAPORAN --}}
        <section class="reports">
            <h3>Laporan Anda</h3>

            <ul>
                @forelse($laporans as $item)
                    <li>
                        {{ $loop->iteration }}. {{ $item->judul }}
                        <a href="{{ route('laporan.show', $item->id_laporan) }}" class="lihat-btn">Lihat</a>
                    </li>
                @empty
                    <p style="color:#333;">Belum ada laporan.</p>
                @endforelse
            </ul>
        </section>

        {{-- SECURITY --}}
        <section class="security">
            <h3>Keamanan</h3>

            <label for="password">Kata Sandi Anda</label>
            <input type="password" value="*************" readonly>

            <a href="{{ route('profil.password') }}" class="btn-primary">Ubah Kata Sandi</a>
        </section>

    </div>

</main>
@endsection
