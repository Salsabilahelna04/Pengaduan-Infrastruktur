@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar_admin')
@endsection
@section('title', 'Detail Laporan Admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/detail_admin.css') }}">

<div class="container-detail">
    <h2>Detail Laporan</h2>

    <div class="detail-card">
        <div class="detail-info">
            <p><strong>Judul:</strong> {{ $laporan->judul }}</p>
            <p><strong>Nama Pelapor:</strong> {{ $laporan->warga->name ?? 'Tidak diketahui' }}</p>
            <p><strong>Jenis Laporan:</strong> {{ $laporan->jenis_laporan }}</p>
            <p><strong>Tanggal:</strong> {{ $laporan->tanggal }}</p>
            <p><strong>Status Saat Ini:</strong> 
                <span class="status {{ $laporan->status }}">{{ ucfirst($laporan->status) }}</span>
            </p>
            <p><strong>Detail:</strong> {{ $laporan->keterangan }}</p>
        </div>

        @if ($laporan->foto)
        <div class="detail-img">
            <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto Laporan">
        </div>
        @endif
    </div>

    <form action="{{ route('admin.laporan.updateStatus', $laporan->id_laporan) }}" method="POST">
    @csrf
    <label for="status">Ubah Status:</label>
    <select name="status" id="status" required>
    <option value="diajukan" {{ $laporan->status == 'diajukan' ? 'selected' : '' }}>Diajukan</option>
    <option value="verifikasi" {{ $laporan->status == 'verifikasi' ? 'selected' : '' }}>Verifikasi</option>
    <option value="proses" {{ $laporan->status == 'proses' ? 'selected' : '' }}>Sedang Dikerjakan</option>
    <option value="selesai" {{ $laporan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
    <option value="ditolak" {{ $laporan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
</select>
  </select>

    <button type="submit" class="btn-update">Simpan</button>
</form>

</div>
@endsection
