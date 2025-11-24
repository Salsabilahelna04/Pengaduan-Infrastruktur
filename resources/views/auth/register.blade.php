<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Lapor RT</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
<div class="auth-container">
    <div class="auth-form">
        <h2>SIGN UP</h2>

        {{-- Alert --}}
        @if($errors->any())
            <div class="alert error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nama Lengkap" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="text" name="phone" placeholder="Nomor HP" required>
            <input type="text" name="address" placeholder="Alamat" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

            <button type="submit">Sign Up</button>
            <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
        </form>
    </div>

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
