@extends('layouts.app')


@section('navbar')
    @include('layouts.navbar_warga')
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/keamanan.css') }}">

<h2>Keamanan Akun</h2>

@if ($errors->any())
<div class="alert-danger">
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
@endif

@if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('profil.update.password') }}" method="POST" class="security-form">
    @csrf

    <label>Password Lama</label>
    <input type="password" name="current_password" required>

    <label>Password Baru</label>
    <input type="password" name="new_password" required>

    <label>Konfirmasi Password Baru</label>
    <input type="password" name="confirm_new_password" required>

    <button type="submit">Ubah Password</button>
</form>
@endsection
