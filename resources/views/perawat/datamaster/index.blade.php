<link rel="stylesheet" href="{{ asset('css/datamaster.css') }}">

<div class="datamaster-container">
    <div class="datamaster-header">
        <div class="header-icon">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
            </svg>
        </div>
        <div class="header-content">
            <h2 class="datamaster-title">Data Master Perawat RSHP</h2>
            <p class="datamaster-subtitle">Kelola antrian pasien dan rekam medis</p>
        </div>
    </div>

    {{-- 🔙 Tombol Back ke Dashboard --}}
    <div class="back-dashboard">
        <a href="{{ route('perawat.dashboard') }}" class="btn-back-dashboard">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
            Kembali ke Dashboard
        </a>
    </div>

    <div class="menu-grid">
        <!-- Daftar Antrian -->
        <a href="{{ route('perawat.datamaster.temudokter.index') }}" class="menu-card">
            <div class="menu-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
            </div>
            <div class="menu-content">
                <h3 class="menu-title">Daftar Antrian</h3>
                <p class="menu-description">Kelola data antrian pasien & temu dokter</p>
            </div>
            <div class="menu-arrow">→</div>
        </a>

        <!-- Rekam Medis -->
        <a href="{{ route('perawat.datamaster.rekammedis.index') }}" class="menu-card">
            <div class="menu-icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                    <path d="M20 2H8a2 2 0 0 0-2 2v14"></path>
                    <path d="M18 22v-4"></path>
                    <path d="M14 22v-4"></path>
                </svg>
            </div>
            <div class="menu-content">
                <h3 class="menu-title">Rekam Medis</h3>
                <p class="menu-description">Kelola catatan rekam medis pasien</p>
            </div>
            <div class="menu-arrow">→</div>
        </a>
    </div>
</div>
