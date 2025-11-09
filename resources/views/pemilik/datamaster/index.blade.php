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
            <h2 class="datamaster-title">Data Kepemilikan</h2>
            <p class="datamaster-subtitle">Lihat informasi tentang hewan peliharaan Anda</p>
        </div>
    </div>

    <div class="back-dashboard">
        <a href="{{ route('pemilik.dashboard') }}" class="btn-back-dashboard">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
            Kembali ke Dashboard
        </a>
    </div>

    <div class="menu-grid">
        <a href="{{ route('pemilik.datamaster.pet.index') }}" class="menu-card">
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
                <h3 class="menu-title">Daftar Pet</h3>
                <p class="menu-description">Data hewan peliharaan terdaftar</p>
            </div>
            <div class="menu-arrow">→</div>
        </a>

        <a href="{{ route('pemilik.datamaster.temudokter.index') }}" class="menu-card">
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
        <a href="{{ route('pemilik.datamaster.rekammedis.index') }}" class="menu-card">
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
