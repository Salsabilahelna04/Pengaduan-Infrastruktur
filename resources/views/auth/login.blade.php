<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Lapor RT</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
<div class="auth-container">
    <!-- KIRI: FORM LOGIN -->
    <div class="auth-form">
        <h2>LOGIN</h2>

        {{-- Notifikasi sukses/error --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        {{-- Validasi error --}}
        @if ($errors->any())
            <div class="alert alert-error">
                <ul style="list-style:none; margin:0; padding:0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="E-mail" required value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Sign In</button>

            <p>Belum Punya Akun? 
                <a href="{{ route('register') }}">Sign Up</a>
            </p>
        </form>
    </div>

    <!-- KANAN: BACKGROUND DAN TEKS -->
    <div class="auth-banner">
    <div class="banner-content">
        <img src="{{ asset('images/LOGO-removebg-preview.png') }}" alt="Logo" class="logo">
        <div class="banner-text">
            <h1>SELAMAT DATANG</h1>
            <p>DI WEBSITE RESMI LAYANAN<br>PENGADUAN INFRASTRUKTUR RT</p>
        </div>
    </div>
</div>
</div>
</body>
</html>
