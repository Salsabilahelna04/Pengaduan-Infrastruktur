@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar_admin')
@endsection
@section('navbar')
    @include('layouts.navbar_admin')
@endsection

@section('title', 'Kelola Pengguna')

@section('content')
<link rel="stylesheet" href="{{ asset('css/kelola_users.css') }}">

<div class="user-container">
    <h2>Kelola Pengguna</h2>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <table class="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone ?? '-' }}</td>
                    <td>{{ $user->address ?? '-' }}</td>

                    <td class="actions">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn-edit">Edit</a>

                        <form action="{{ route('admin.users.destroy', $user->id) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus pengguna ini?');">

                            @csrf
                            @method('DELETE')
                            <button class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
