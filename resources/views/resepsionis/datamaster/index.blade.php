<link rel="stylesheet" href="{{ asset('css/datamaster.css') }}">

<div class="datamaster-container">
    <div class="datamaster-header">
        <div class="header-icon">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
        </div>
        <div class="header-content">
            <h2 class="datamaster-title">Data Master Resepsionis RSHP</h2>
            <p class="datamaster-subtitle">Kelola data pemilik, hewan peliharaan, dan antrian temu dokter</p>
        </div>
    </div>

    {{-- 🔙 Tombol Back ke Dashboard --}}
    <div class="back-dashboard">
        <a href="{{ route('resepsionis.dashboard') }}" class="btn-back-dashboard">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
            Kembali ke Dashboard
        </a>
    </div>

    <div class="menu-grid">
        <!-- Pemilik -->
        <a href="{{ route('resepsionis.datamaster.pemilik.index') }}" class="menu-card">
            <div class="menu-icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="7" r="4"></circle>
                    <path d="M5.5 21a7.5 7.5 0 0 1 13 0"></path>
                </svg>
            </div>
            <div class="menu-content">
                <h3 class="menu-title">Data Pemilik</h3>
                <p class="menu-description">Kelola data pemilik hewan</p>
            </div>
            <div class="menu-arrow">→</div>
        </a>

        <!-- Pet -->
        <a href="{{ route('resepsionis.datamaster.pet.index') }}" class="menu-card">
            <div class="menu-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="4" r="2"></circle>
                    <circle cx="18" cy="8" r="2"></circle>
                    <circle cx="20" cy="16" r="2"></circle>
                    <circle cx="4" cy="8" r="2"></circle>
                    <circle cx="2" cy="16" r="2"></circle>
                    <path d="M11 6c-1.5 0-3.5 1-4 3-1 4 0 9 4 9s5-5 4-9c-.5-2-2.5-3-4-3z"></path>
                </svg>
            </div>
            <div class="menu-content">
                <h3 class="menu-title">Data Hewan Peliharaan</h3>
                <p class="menu-description">Kelola hewan milik pelanggan</p>
            </div>
            <div class="menu-arrow">→</div>
        </a>

        <!-- Temu Dokter / Antrian -->
        <a href="{{ route('resepsionis.datamaster.temudokter.index') }}" class="menu-card">
            <div class="menu-icon" style="background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
            </div>
            <div class="menu-content">
                <h3 class="menu-title">Temu Dokter / Antrian</h3>
                <p class="menu-description">Atur jadwal dan antrian pasien</p>
            </div>
            <div class="menu-arrow">→</div>
        </a>
    </div>
</div>
