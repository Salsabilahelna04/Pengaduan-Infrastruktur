@extends('layouts.app')


@section('navbar')
    @include('layouts.navbar_warga')
@endsection
@section('content')
<link rel="stylesheet" href="{{ asset('css/laporan.css') }}">

<main>
    
    <div class="form-container">
        
        <h2>FORM LAPORAN PENGADUAN</h2>

        {{-- Tampilkan pesan error validasi dari Laravel --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Pesan validasi JavaScript --}}
        <div id="alertMessage" class="alert alert-danger" style="display:none;">
            <strong>Harap isi semua kolom wajib yang ditandai dengan <span style="color:red">*</span></strong>
        </div>

        <form id="laporanForm" action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf

            {{-- Jenis Laporan --}}
            <label for="jenis_laporan">Jenis Laporan <span class="required">*</span></label>
            <select name="jenis_laporan" id="jenis_laporan" required>
                <option value="">Pilih Jenis Laporan</option>
                <option value="Kebersihan">Kebersihan</option>
                <option value="Keamanan">Keamanan</option>
                <option value="Fasilitas Umum">Fasilitas Umum</option>
            </select>

            {{-- Judul Laporan --}}
            <label for="judul">Judul Laporan <span class="required">*</span></label>
            <input type="text" name="judul" id="judul" required minlength="5" maxlength="100"
                   placeholder="Masukkan judul laporan">

            {{-- Tanggal --}}
            <label for="tanggal">Tanggal Laporan <span class="required">*</span></label>
            <input type="date" name="tanggal" id="tanggal" required>

            {{-- Alamat --}}
            <label for="alamat">Alamat / Tempat Kejadian <span class="required">*</span></label>
            <textarea name="alamat" id="alamat" rows="2" required
                      placeholder="Tuliskan lokasi kejadian"></textarea>

            {{-- Keterangan --}}
            <label for="keterangan">Keterangan <span class="required">*</span></label>
            <textarea name="keterangan" id="keterangan" rows="4" required minlength="10"
                      placeholder="Deskripsikan kejadian secara singkat"></textarea>

            {{-- Foto Pendukung --}}
            <label for="foto">Foto Pendukung (wajib diunggah) <span class="required">*</span></label>
            <input type="file" name="foto" id="foto" accept=".jpg,.jpeg,.png" required>

            {{-- Urgensi --}}
            <label>Urgensi Laporan <span class="required">*</span></label>
            <div class="radio-group">
                <label><input type="radio" name="urgensi" value="Mendesak" required> Mendesak</label>
                <label><input type="radio" name="urgensi" value="Tidak Terlalu Mendesak" required> Tidak Terlalu Mendesak</label>
            </div>

            {{-- Tombol Aksi --}}
            <div class="button-group">
                <a href="{{ url()->previous() }}" class="btn-cancel">BATAL</a>
                <button type="submit" class="btn-submit">KIRIM LAPORAN</button>
            </div>
        </form>
    </div>

    <!-- POPUP KONFIRMASI -->
<div id="popupKonfirmasi" class="popup-overlay" style="display:none;">
    <div class="popup-box">
        <h3>Anda Yakin Untuk Mengirim Laporan?</h3>
        <p>Pastikan Semua data diisi dengan benar</p>

        <div class="popup-buttons">
            <button id="btnCancelModal" class="btn-modal-cancel">Batal</button>
            <button id="btnConfirmModal" class="btn-modal-confirm">Yakin</button>
        </div>
    </div>
</div>

</main>

<script>
document.getElementById('laporanForm').addEventListener('submit', function(event) {
    event.preventDefault(); // cegah submit langsung

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

    // Jika ada kolom kosong → tampilkan pesan error
    if (!allFilled) {
        document.getElementById('alertMessage').style.display = 'block';
        window.scrollTo({ top: 0, behavior: 'smooth' });
        return;
    }

    // Jika semua terisi → tampilkan popup konfirmasi
    document.getElementById('popupKonfirmasi').style.display = 'flex';
});

// Tombol batal popup
document.getElementById('btnCancelModal').onclick = function() {
    document.getElementById('popupKonfirmasi').style.display = 'none';
};

// Tombol yakin popup → submit form
document.getElementById('btnConfirmModal').onclick = function() {
    document.getElementById('laporanForm').submit();
};
</script>

@endsection