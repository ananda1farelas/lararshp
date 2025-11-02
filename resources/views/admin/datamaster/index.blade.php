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
            <h2 class="datamaster-title">Data Master RSHP</h2>
            <p class="datamaster-subtitle">Kelola seluruh data master sistem rumah sakit hewan peliharaan</p>
        </div>
    </div>

    {{-- 🔙 Tombol Back ke Dashboard --}}
    <div class="back-dashboard">
        <a href="{{ route('admin.dashboard') }}" class="btn-back-dashboard">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
            Kembali ke Dashboard
        </a>
    </div>

    <div class="menu-grid">
        <!-- Role -->
        <a href="{{ route('admin.datamaster.role.index') }}" class="menu-card">
            <div class="menu-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
            </div>
            <div class="menu-content">
                <h3 class="menu-title">Daftar Role</h3>
                <p class="menu-description">Kelola hak akses pengguna</p>
            </div>
            <div class="menu-arrow">→</div>
        </a>

        <!-- Role User -->
        <a href="{{ route('admin.datamaster.role_user.index') }}" class="menu-card">
            <div class="menu-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="8.5" cy="7" r="4"></circle>
                    <line x1="20" y1="8" x2="20" y2="14"></line>
                    <line x1="23" y1="11" x2="17" y2="11"></line>
                </svg>
            </div>
            <div class="menu-content">
                <h3 class="menu-title">Daftar RoleUser</h3>
                <p class="menu-description">Atur role untuk setiap pengguna</p>
            </div>
            <div class="menu-arrow">→</div>
        </a>

        <!-- Pet -->
        <a href="{{ route('admin.datamaster.pet.index') }}" class="menu-card">
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

        <!-- Jenis Hewan -->
        <a href="{{ route('admin.datamaster.jenishewan.index') }}" class="menu-card">
            <div class="menu-icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
            </div>
            <div class="menu-content">
                <h3 class="menu-title">Daftar Jenis Hewan</h3>
                <p class="menu-description">Kategori jenis hewan</p>
            </div>
            <div class="menu-arrow">→</div>
        </a>

        <!-- Ras Hewan -->
        <a href="{{ route('admin.datamaster.rashewan.index') }}" class="menu-card">
            <div class="menu-icon" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                </svg>
            </div>
            <div class="menu-content">
                <h3 class="menu-title">Daftar Ras Hewan</h3>
                <p class="menu-description">Jenis ras per kategori hewan</p>
            </div>
            <div class="menu-arrow">→</div>
        </a>

        <!-- Kategori -->
        <a href="{{ route('admin.datamaster.kategori.index') }}" class="menu-card">
            <div class="menu-icon" style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="8" y1="6" x2="21" y2="6"></line>
                    <line x1="8" y1="12" x2="21" y2="12"></line>
                    <line x1="8" y1="18" x2="21" y2="18"></line>
                    <line x1="3" y1="6" x2="3.01" y2="6"></line>
                    <line x1="3" y1="12" x2="3.01" y2="12"></line>
                    <line x1="3" y1="18" x2="3.01" y2="18"></line>
                </svg>
            </div>
            <div class="menu-content">
                <h3 class="menu-title">Daftar Kategori</h3>
                <p class="menu-description">Kategori produk dan layanan</p>
            </div>
            <div class="menu-arrow">→</div>
        </a>

        <!-- Kategori Klinis -->
        <a href="{{ route('admin.datamaster.kategoriklinis.index') }}" class="menu-card">
            <div class="menu-icon" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                </svg>
            </div>
            <div class="menu-content">
                <h3 class="menu-title">Daftar Kategori Klinis</h3>
                <p class="menu-description">Kategori pemeriksaan klinis</p>
            </div>
            <div class="menu-arrow">→</div>
        </a>

        <!-- Kode Tindakan Terapi -->
        <a href="{{ route('admin.datamaster.kodetindakanterapi.index') }}" class="menu-card">
            <div class="menu-icon" style="background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="12" y1="18" x2="12" y2="12"></line>
                    <line x1="9" y1="15" x2="15" y2="15"></line>
                </svg>
            </div>
            <div class="menu-content">
                <h3 class="menu-title">Daftar Kode Tindakan Terapi</h3>
                <p class="menu-description">Kode untuk tindakan medis</p>
            </div>
            <div class="menu-arrow">→</div>
        </a>
    </div>
</div>
