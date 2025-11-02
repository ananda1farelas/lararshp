<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard RSHP - Perawat</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <header class="header-dashboard">
        <div class="header-left">
            <h1>🐾 RSHP - Dashboard Perawat</h1>
        </div>
        <div class="header-right">
            <span class="welcome-text">Halo, {{ session('user_name') }}</span>
            <a href="{{ route('logout') }}" class="btn danger small">🚪 Logout</a>
        </div>
    </header>