<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Interaktif</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
<nav class="navbar">
    <!-- Menu kiri -->
    <ul class="nav-left">
        <li><a href="{{ url('homepage') }}">Beranda</a></li>
        <li class="dropdown">
            <a href="#">Tentang Kami</a>
            <ul class="dropdown-menu">
                <li><a href="{{ url('sejarah') }}">Sejarah</a></li>
                <li><a href="{{ url('visi') }}">Visi & Misi</a></li>
                <li><a href="{{ url('struktur') }}">Struktur Organisasi</a></li>
            </ul>
        </li>
        <li><a href="{{ url('layanan') }}">Layanan</a></li>
    </ul>

    <!-- Menu kanan -->
    <ul class="nav-right">
        <li><a href="{{ url('login') }}" class="btn-login">Login</a></li>
    </ul>
</nav>
</body>
</html>
