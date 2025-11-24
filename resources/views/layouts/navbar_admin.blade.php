<nav class="navbar">
    <div class="logo">
        <img src="{{ asset('images/LOGO-removebg-preview.png') }}" alt="Lapor RT" class="logo-img">
    </div>

    <ul class="nav-links">
        <li><a href="{{ route('dashboard.admin') }}">Home</a></li>
        <li><a href="{{ route('admin.users.index') }}">Kelola Pengguna</a></li>
        <li>
            <a href="{{ route('logout') }}" class="btn-logout"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Keluar
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
