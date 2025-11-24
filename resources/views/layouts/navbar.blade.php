@php
    use Illuminate\Support\Facades\Auth;
@endphp

<nav class="navbar">
    <div class="logo">
        <img src="{{ asset('images/LOGO-removebg-preview.png') }}" alt="Lapor RT" class="logo-img">
        <span class="logo-text">Lapor RT</span>
    </div>

    <ul class="nav-links">
        {{-- Jika BELUM login (landing page) --}}
        @guest
            <li><a href="{{ route('login') }}" class="btn-login">Masuk</a></li>
            <li><a href="{{ route('register') }}" class="btn-register">Daftar</a></li>
        @endguest

        {{-- Jika SUDAH login sebagai warga --}}
        @auth
            @if(Auth::user()->role === 'warga')
                <li><a href="{{ route('dashboard.warga') }}">Home</a></li>
                <li><a href="{{ route('warga.informasi') }}">About</a></li>
                <li><a href="{{ route('profil.index') }}">Profil</a></li>
                <li>
                    <a href="{{ route('logout') }}" class="btn-logout"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display:none;"></form>
                </li>
            @endif

            {{-- Jika SUDAH login sebagai admin --}}
            @if(Auth::user()->role === 'admin')
                <li><a href="{{ route('dashboard.admin') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.laporan.show', 1) }}">Kelola Laporan</a></li>
                <li>
                    <a href="{{ route('logout') }}" class="btn-logout"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display:none;"></form>
                </li>
            @endif
        @endauth
    </ul>
</nav>
