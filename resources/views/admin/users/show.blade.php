@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar_admin')
@endsection

@section('title', 'Detail Pengguna')

@section('content')
<link rel="stylesheet" href="{{ asset('css/kelola_users.css') }}">

<div class="detail-container">
    <h2>Detail Pengguna</h2>

    <div class="detail-card">

        <img src="{{ $user->foto 
    ? asset('storage/foto_profil/' . $user->foto) 
    : asset('images/default-user.png') 
}}" 
class="detail-photo">



        <p><strong>ID:</strong> {{ $user->id }}</p>
        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>No HP:</strong> {{ $user->phone ?? '-' }}</p>
        <p><strong>Alamat:</strong> {{ $user->address ?? '-' }}</p>

        <a href="{{ route('admin.users.index') }}" class="btn-back">Kembali</a>
    </div>
</div>
@endsection
