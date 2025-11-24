<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lapor RT')</title>

    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}">

    @yield('styles')
</head>
<body>

    @yield('navbar')

    <main>
        @yield('content')
    </main>

    @if (session('success_title'))
    <div id="popup-success" class="popup-success">
        <div class="popup-card">
            <h2 class="popup-title">{{ session('success_title') }}</h2>

            <img src="{{ asset('images/selesai.png') }}" class="popup-icon">

            <p class="popup-text">{{ session('success_message') }}</p>
        </div>
    </div>

    <script>
        const popup = document.getElementById('popup-success');
        popup.classList.add('show');
        setTimeout(() => popup.classList.remove('show'), 3500);
    </script>
    @endif

</body>
</html>
