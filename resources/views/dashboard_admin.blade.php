@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar_admin')
@endsection

@section('title', 'Dashboard Admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard_admin.css') }}">

<section class="dashboard-admin">
    <h2>Selamat Datang <br> Admin</h2>

    {{-- STATISTIK CARD --}}
    <div class="card-container">

        <a href="{{ route('dashboard.admin', ['filter' => 'semua']) }}" class="card">
            <div>
                <h4>Total Laporan</h4>
                <span>{{ $laporans->count() }}</span>
            </div>
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828817.png">
        </a>

        <a href="{{ route('dashboard.admin', ['filter' => 'mendesak']) }}" class="card">
            <div>
                <h4>Laporan Mendesak</h4>
                <span>{{ $laporans->where('urgensi', 'Mendesak')->count() }}</span>
            </div>
            <img src="https://cdn-icons-png.flaticon.com/512/564/564619.png">
        </a>

        <a href="{{ route('dashboard.admin', ['filter' => 'pending']) }}" class="card">
            <div>
                <h4>Menunggu Tindakan</h4>
                <span>{{ $laporans->where('status', '!=', 'selesai')->count() }}</span>
            </div>
            <img src="https://cdn-icons-png.flaticon.com/512/833/833472.png">
        </a>

    </div>

    {{-- TABEL LAPORAN --}}
    <div class="table-container">
        <h3 class="section-title">
        Daftar Laporan Masuk

        @if($filter == 'mendesak')
            <span class="filter-badge filter-mendesak">Mendesak</span>
        @elseif($filter == 'pending')
            <span class="filter-badge filter-pending">Menunggu Tindakan</span>
        @endif
        </h3>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pelapor</th>
                    <th>Jenis</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Urgensi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($laporans as $laporan)
                    <tr>
                        <td>{{ $laporan->id_laporan }}</td>
                        <td>{{ $laporan->warga->name ?? 'Tidak diketahui' }}</td>
                        <td>{{ $laporan->jenis_laporan }}</td>
                        <td>{{ $laporan->judul }}</td>
                        <td>{{ $laporan->tanggal }}</td>
                        <td>{{ ucfirst($laporan->status) }}</td>
                        <td>{{ $laporan->urgensi }}</td>
                        <td>
    <a href="{{ route('admin.laporan.show', $laporan->id_laporan) }}" class="btn-detail">Detail</a>

    <form action="{{ route('admin.laporan.destroy', $laporan->id_laporan) }}" 
          method="POST" 
          style="display:inline-block;"
          onsubmit="return confirm('Yakin ingin menghapus laporan ini?');">
        @csrf
        @method('DELETE')
        <button class="btn-delete">Hapus</button>
    </form>
</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Belum ada laporan masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
