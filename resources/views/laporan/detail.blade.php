@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar_warga')
@endsection
@section('content')
<link rel="stylesheet" href="{{ asset('css/detail-laporan.css') }}">

<div class="detail-container">
    <div class="detail-card">
        <h2 class="detail-title">Detail Laporan Anda</h2>

        <div class="detail-content">
            <div class="detail-info">
                <div class="detail-header">
                    <span class="judul">{{ $laporan->judul }}</span>
                    <span class="status status-{{ strtolower($laporan->status) }}">
    Status Laporan : {{ ucfirst($laporan->status) }}
</span>

                </div>

                <div class="detail-box">
                    <p><strong>Nama Pelapor:</strong> {{ Auth::user()->name }}</p>

                </div>
                <div class="detail-box">
                    <p><strong>Jenis Laporan:</strong> {{ $laporan->jenis_laporan }}</p>
                </div>
                <div class="detail-box">
                    <p><strong>Tanggal Laporan:</strong> {{ \Carbon\Carbon::parse($laporan->tanggal)->translatedFormat('d F Y') }}</p>
                </div>
                <div class="detail-box">
                    <p><strong>Detail Laporan:</strong> {{ $laporan->keterangan }}</p>
                </div>

                <div class="button-group">
                    <a href="{{ route('laporan.edit', $laporan->id_laporan) }}" class="btn-edit">Edit Laporan</a>

                    <form action="{{ route('laporan.destroy', $laporan->id_laporan) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Hapus Laporan</button>
                    </form>
                </div>
            </div>

            <div class="detail-image">
                @if ($laporan->foto)
                    <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto Laporan">
                @else
                    <img src="{{ asset('images/default.jpg') }}" alt="Default Image">
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
