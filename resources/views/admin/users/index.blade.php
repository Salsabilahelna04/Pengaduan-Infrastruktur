@extends('layouts.app')

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
                <th>Foto</th>
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

                    <td>
                        <img src="{{ $user->foto 
    ? asset('storage/foto_profil/' . $user->foto) 
    : asset('images/default-user.png') 
}}" 
class="detail-photo">

                    </td>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone ?? '-' }}</td>
                    <td>{{ $user->address ?? '-' }}</td>

                    <td class="actions">

                        {{-- tombol lihat detail --}}
                        <a href="{{ route('admin.users.show', $user->id) }}"
                           class="btn-detail">Detail</a>

                        {{-- tombol delete --}}
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
