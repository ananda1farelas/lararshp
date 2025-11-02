<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard RSHP - Pemilik</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <header class="header-dashboard">
        <div class="header-left">
            <h1>🐾 RSHP - Dashboard Pemilik</h1>
        </div>
        <div class="header-right">
            <span class="welcome-text">Halo, {{ session('user_name') }}</span>
            <a href="{{ route('logout') }}" class="btn danger small">🚪 Logout</a>
        </div>
    </header>

    <main class="main-dashboard">
        {{-- Bagian Sambutan --}}
        <section class="welcome-section">
            <h2>Selamat Datang di Klinik Hewan RSHP UNAIR</h2>
            <p class="role-info">Anda login sebagai <strong>{{ session('user_role_name') }}</strong></p>
            <div class="menu-links">
                <a href="{{ route('pemilik.datamaster.index') }}" class="btn primary">➡️ Menu Pemilik</a>
            </div>
        </section>

        {{-- Bagian Statistik --}}
        <section class="stats-section">
            <h3>📊 Statistik Data Saya</h3>
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="label">🐾 Total Hewan Peliharaan</span>
                    <span class="value">{{ $totalPet }}</span>
                </div>
                <div class="stat-card">
                    <span class="label">🩺 Total Temu Dokter</span>
                    <span class="value">{{ $totalTemuDokter }}</span>
                </div>
                <div class="stat-card">
                    <span class="label">📋 Total Rekam Medis</span>
                    <span class="value">{{ $totalRekamMedis }}</span>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>© 2025 RSHP UNAIR | Sistem Informasi Klinik Hewan</p>
    </footer>
</body>
</html>
