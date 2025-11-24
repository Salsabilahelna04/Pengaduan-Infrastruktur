<nav class="navbar">
    <div class="logo">
        <img 
            src="{{ asset('images/LOGO-removebg-preview.png') }}" 
            alt="Logo Lapor RT" 
            class="logo-img"
        >
    </div>

    <ul class="nav-links">
        <li>
            <a href="{{ route('login') }}" class="btn-login">Masuk</a>
        </li>
        <li>
            <a href="{{ route('register') }}" class="btn-register">Daftar</a>
        </li>
    </ul>
</nav>
