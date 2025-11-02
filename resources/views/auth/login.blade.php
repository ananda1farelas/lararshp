<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login RSHP</title>
    
    <!-- Boxicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- CSS Custom -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    @include('layout.navbar')

    <div class="login-container">
        <div class="login-box">
            <h2><i class='bx bxs-lock-alt'></i> Login</h2>

            {{-- Tampilkan error / success message --}}
            @if ($errors->any())
                <div class="alert alert-danger" id="flash-message">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success" id="flash-message">
                {{ session('success') }}</div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required autofocus>
                    <i class="fas fa-user"></i>
                </div>

                <div class="input-group">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <i class="fas fa-eye toggle-password" onclick="togglePassword()"></i>
                </div>

                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>Ingat saya</span>
                    </label>
                    <a href="#" class="forgot-password">Lupa password?</a>
                </div>

                <button type="submit">
                    <span>Login</span>
                    <i class='bx bx-right-arrow-alt'></i>
                </button>
            </form>
            <div class="login-footer">
                <p>Belum punya akun? <a href="{{ route('auth.register') }}">Daftar sekarang</a></p>
            </div>
        </div>
    </div>

    <script>
        setTimeout(() => {
            const msg = document.getElementById('flash-message');
            if (msg) {
                msg.style.transition = 'opacity 0.5s ease';
                msg.style.opacity = '0';
                setTimeout(() => msg.remove(), 500);
            }
        }, 1000);
    </script>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>

</body>
</html>