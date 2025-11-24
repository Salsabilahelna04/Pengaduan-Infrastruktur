<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Ditolak</title>

    <link rel="stylesheet" href="{{ asset('css/email.css') }}">
</head>
<body>

<div class="email-card">
    <div class="header header-danger">
        <h2>Laporan Ditolak</h2>
        <p>Maaf, laporan Anda tidak dapat diproses.</p>
    </div>

    <div class="content">

        <p>Halo <strong>{{ $laporan->warga->name }}</strong>,</p>

        <p>Laporan Anda dengan judul:</p>

        <div class="detail-box">
            <p><strong>{{ $laporan->judul }}</strong></p>
            <p>Jenis Laporan: {{ $laporan->jenis_laporan }}</p>
            <p>Tanggal: {{ $laporan->tanggal }}</p>
            <p>Status: <strong style="color:#dc3545;">Ditolak</strong></p>
        </div>

        <p>
            Laporan ini <strong>tidak valid</strong> sehingga tidak dapat diproses lebih lanjut.
        </p>

        <p>Beberapa kemungkinan alasan:</p>

        <ul>
            <li>Bukti tidak sesuai</li>
            <li>Informasi kurang lengkap</li>
            <li>Laporan tidak bisa diverifikasi</li>
        </ul>

        <p>Silakan ajukan laporan baru apabila diperlukan.</p>
    </div>

    <div class="footer">
        <p>&copy; {{ date('Y') }} Sistem Pelaporan Warga</p>
    </div>
</div>

</body>
</html>
