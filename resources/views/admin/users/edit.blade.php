@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar_admin')
@endsection
@section('navbar')
    @include('layouts.navbar_admin')
@endsection

@section('title', 'Edit Pengguna')

@section('content')
<link rel="stylesheet" href="{{ asset('css/kelola_users.css') }}">

<div class="user-container">
    <h2>Edit Data Pengguna</h2>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="edit-form">
        @csrf
        @method('PUT')

        <label>Nama</label>
        <input type="text" name="name" value="{{ $user->name }}" required>

        <label>Email</label>
        <input type="email" name="email" value="{{ $user->email }}" required>

        <label>No HP</label>
        <input type="text" name="no_hp" value="{{ $user->no_hp }}">

        <label>Alamat</label>
        <textarea name="alamat">{{ $user->alamat }}</textarea>

        <button type="submit" class="btn-save">Simpan</button>
    </form>
</div>

@endsection
