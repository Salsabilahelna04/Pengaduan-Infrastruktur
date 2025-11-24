@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar_warga')
@endsection
@section('content')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">

<main>
    <div class="container">
        <h2>Edit Laporan Pengaduan</h2>

        {{-- Pesan sukses --}}
        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        {{-- Pesan error --}}
        @if ($errors->any())
            <div class="alert danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Notifikasi wajib isi --}}
        <div id="alertMessage" class="alert danger" style="display:none;">
            <strong>Harap isi semua kolom wajib yang ditandai dengan <span style="color:red">*</span></strong>
        </div>

        <form id="editForm" action="{{ route('laporan.update', $laporan->id_laporan) }}" method="POST" enctype="multipart/form-data" class="form-laporan" novalidate>
            @csrf
            @method('PUT')

            {{-- Judul Laporan --}}
            <div class="form-group">
                <label for="judul">Judul Laporan <span class="required">*</span></label>
                <input type="text" name="judul" id="judul"
                       value="{{ old('judul', $laporan->judul) }}" required>
            </div>

            {{-- Keterangan --}}
            <div class="form-group">
                <label for="keterangan">Keterangan <span class="required">*</span></label>
                <textarea name="keterangan" id="keterangan" rows="5" required>{{ old('keterangan', $laporan->keterangan) }}</textarea>
            </div>

            {{-- Alamat --}}
            <div class="form-group">
                <label for="alamat">Alamat Lokasi <span class="required">*</span></label>
                <input type="text" name="alamat" id="alamat"
                       value="{{ old('alamat', $laporan->alamat) }}" required>
            </div>

            {{-- Urgensi --}}
            <div class="form-group">
                <label for="urgensi">Tingkat Urgensi <span class="required">*</span></label>
                <select name="urgensi" id="urgensi" required>
                    <option value="Mendesak" {{ $laporan->urgensi == 'Mendesak' ? 'selected' : '' }}>Mendesak</option>
                    <option value="Tidak Terlalu Mendesak" {{ $laporan->urgensi == 'Tidak Terlalu Mendesak' ? 'selected' : '' }}>Tidak Terlalu Mendesak</option>
                </select>
            </div>

            {{-- Foto --}}
            <div class="form-group">
                <label for="foto">Foto Laporan (opsional)</label><br>
                @if ($laporan->foto)
                    <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto Laporan" class="preview-foto">
                @endif
                <input type="file" name="foto" id="foto" accept="image/*">
            </div>

            {{-- Tombol --}}
            <div class="form-actions">
                <button type="submit" class="btn-primary">Simpan Perubahan</button>
                <a href="{{ route('laporan.show', $laporan->id_laporan) }}" class="btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</main>

{{-- Validasi front-end --}}
<script>
document.getElementById('editForm').addEventListener('submit', function(event) {
    const requiredFields = this.querySelectorAll('[required]');
    let allFilled = true;

    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            allFilled = false;
            field.style.border = '2px solid red';
        } else {
            field.style.border = '';
        }
    });

    if (!allFilled) {
        event.preventDefault();
        document.getElementById('alertMessage').style.display = 'block';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
});
</script>
@endsection
