<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Selesai</title>

    {{-- CSS dari public/css/email.css --}}
    <link rel="stylesheet" href="{{ public_path('css/email.css') }}">
</head>
<body>

<div class="email-card">
    <div class="header">
        <h2>Laporan Telah Selesai</h2>
        <p>Terima kasih telah melapor. Berikut status terbaru laporan Anda:</p>
    </div>

    <div class="content">

        <p>Halo <strong>{{ $laporan->warga->name }}</strong>,</p>
        <p>
            Kami ingin menginformasikan bahwa laporan Anda dengan judul:
        </p>

        <div class="detail-box">
            <p><strong>{{ $laporan->judul }}</strong></p>
            <p>Jenis Laporan: {{ $laporan->jenis_laporan }}</p>
            <p>Tanggal: {{ $laporan->tanggal }}</p>
            <p>Status: <strong style="color:#28a745;">Selesai</strong></p>
        </div>

        <p>
            Tim kami telah menyelesaikan proses penanganan laporan Anda.  
            Terima kasih atas kerja sama Anda dalam menjaga lingkungan dan fasilitas.
        </p>

        <p>Jika ingin melihat detail laporan, klik tombol berikut:</p>

        <center>
            <a href="{{ url('/laporan/' . $laporan->id_laporan) }}" class="btn">Lihat Detail Laporan</a>
        </center>

        <p style="margin-top: 20px;">
            Jika ada foto laporan, sudah kami lampirkan dalam email ini.
        </p>
    </div>

    <div class="footer">
        <p>&copy; {{ date('Y') }} Sistem Pelaporan Warga • RT/RW Digital</p>
    </div>
</div>

</body>
</html>
