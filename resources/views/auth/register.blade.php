<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun Baru</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="register-wrapper">
        <div class="register-container">
            <div class="register-header">
                <div class="icon-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <h2>Registrasi Akun Baru</h2>
                <p>Silakan lengkapi form di bawah untuk membuat akun</p>
            </div>

            {{-- Tampilkan pesan error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <div class="alert-icon">⚠️</div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Tampilkan pesan sukses --}}
            @if (session('success'))
                <div class="alert alert-success">
                    <div class="alert-icon">✓</div>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('auth.register.store') }}" class="register-form">
                @csrf

                <div class="form-group">
                    <label for="nama">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        Nama Lengkap
                    </label>
                    <input type="text" name="nama" id="nama" 
                           class="form-control" value="{{ old('nama') }}" 
                           placeholder="Masukkan nama lengkap Anda" required>
                </div>

                <div class="form-group">
                    <label for="email">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        Alamat Email
                    </label>
                    <input type="email" name="email" id="email" 
                           class="form-control" value="{{ old('email') }}" 
                           placeholder="contoh@email.com" required>
                </div>

                <div class="form-group">
                    <label for="password">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        Kata Sandi
                    </label>
                    <input type="password" name="password" id="password" 
                           class="form-control" placeholder="Minimal 6 karakter" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        Konfirmasi Kata Sandi
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                           class="form-control" placeholder="Ulangi kata sandi" required>
                </div>

                <button type="submit" class="btn-submit">
                    <span>Daftar Sekarang</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </button>

                <div class="register-footer">
                    <p>Sudah punya akun? <a href="{{ url('/login') }}">Login di sini</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>