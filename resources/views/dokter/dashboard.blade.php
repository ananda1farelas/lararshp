<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard RSHP - Dokter</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

    <header class="header-dashboard">
        <div class="header-left">
            <h1>🐾 RSHP - Dashboard Dokter</h1>
        </div>
        <div class="header-right">
            <span class="welcome-text">Halo, {{ session('user_name') }}</span>
            <a href="{{ route('logout') }}" class="btn danger small">🚪 Logout</a>
        </div>
    </header>

    <main class="main-dashboard">
        {{-- Bagian Sambutan --}}
        <section class="welcome-section">
            <h2>Selamat Datang di RSHP UNAIR</h2>
            <p class="role-info">Anda login sebagai <strong>{{ session('user_role') }}</strong></p>

            <div class="menu-links">
                <a href="{{ route('admin.datamaster') }}" class="btn primary">➡️ Menu Data Master</a>
            </div>
        </section>

        {{-- Bagian Statistik --}}
        <section class="stats-section">
            <h3>📊 Statistik Sistem</h3>
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="label">👤 Total User</span>
                    <span class="value">{{ $totalUser }}</span>
                </div>
                <div class="stat-card">
                    <span class="label">🔐 Total Role</span>
                    <span class="value">{{ $totalRole }}</span>
                </div>
                <div class="stat-card">
                    <span class="label">👪 Total Pemilik</span>
                    <span class="value">{{ $totalPemilik }}</span>
                </div>
                <div class="stat-card">
                    <span class="label">🐾 Total Pet</span>
                    <span class="value">{{ $totalPet }}</span>
                </div>
                <div class="stat-card">
                    <span class="label">🐕 Jenis Hewan</span>
                    <span class="value">{{ $totalJenis }}</span>
                </div>
                <div class="stat-card">
                    <span class="label">🐩 Ras Hewan</span>
                    <span class="value">{{ $totalRas }}</span>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>© 2025 RSHP UNAIR | Sistem Informasi Klinik Hewan</p>
    </footer>

</body>
</html>
