@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar_warga')
@endsection

@section('title', 'Edit Profil')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/profil.css') }}">

<style>
    /* POPUP BACKDROP */
    .popup-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.55);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    /* POPUP BOX */
    .popup-box {
        background: #fff;
        padding: 25px;
        width: 350px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.25);
        animation: fadeIn .25s ease-in-out;
    }

    /* OK BUTTON */
    .popup-btn {
        margin-top: 15px;
        background: #28a745;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 15px;
    }

    .popup-btn:hover {
        background: #218838;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.9); }
        to { opacity: 1; transform: scale(1); }
    }
</style>
@endsection

@section('content')

<div class="edit-container">

    <h2>Edit Profil</h2>

    <form action="{{ route('profil.update') }}" method="POST">
        @csrf

        <label>Nama</label>
        <input type="text" name="name" value="{{ Auth::user()->name }}" required>

        <label>Email</label>
        <input type="email" name="email" value="{{ Auth::user()->email }}" required>

        <label>No HP</label>
        <input type="text" name="phone" value="{{ Auth::user()->phone }}">

        <label>Alamat</label>
        <textarea name="address">{{ Auth::user()->address }}</textarea>

        <button type="submit" class="btn-simpan">Simpan</button>
    </form>

</div>

{{-- POPUP SUCCESS --}}
@if(session('success'))
    <div class="popup-backdrop" id="popup">
        <div class="popup-box">
            <h3 style="margin-bottom:10px;">✔ Berhasil!</h3>
            <p>{{ session('success') }}</p>
            <button class="popup-btn" onclick="document.getElementById('popup').style.display='none'">
                OK
            </button>
        </div>
    </div>
@endif

@endsection
