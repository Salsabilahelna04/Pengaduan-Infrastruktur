@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar_warga')
@endsection

@section('title', 'Edit Profil | Lapor RT')

@section('content')
<link rel="stylesheet" href="{{ asset('css/profil.css') }}">

<main class="edit-container">

    <section class="edit-profile-card">
        <h2>Edit Profil</h2>

        {{-- FOTO --}}
        <div class="profile-picture">
            <img src="{{ Auth::user()->foto ? asset('storage/'.Auth::user()->foto) : asset('images/default-profile.jpg') }}" alt="Foto Profil">

            <label for="upload" class="edit-icon">📷</label>
            <input type="file" id="upload" hidden>
        </div>

        {{-- FORM --}}
        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Nama Lengkap</label>
            <input type="text" name="name" value="{{ Auth::user()->name }}">

            <label>Email</label>
            <input type="email" name="email" value="{{ Auth::user()->email }}">

            <label>No. Telepon</label>
            <input type="tel" name="telepon" value="{{ Auth::user()->telepon }}">

            <label>Alamat</label>
            <textarea name="alamat" rows="3">{{ Auth::user()->alamat }}</textarea>

            <div class="form-buttons">
                <a href="{{ route('profil') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-save">Simpan Perubahan</button>
            </div>
        </form>

    </section>

</main>
@endsection
@if(session('success'))
    <div id="popup-success" class="popup">
        <div class="popup-content">
            <p>{{ session('success') }}</p>
            <button onclick="closePopup()">OK</button>
        </div>
    </div>

    <script>
        document.getElementById('popup-success').style.display = 'flex';

        function closePopup() {
            document.getElementById('popup-success').style.display = 'none';
        }
    </script>
@endif
