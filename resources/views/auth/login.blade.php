<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login RSHP</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('layout.navbar')

    <div class="login-container">
        <div class="login-box">
            <h2><i class='bx bxs-lock'></i> Login</h2>

            {{-- Tampilkan error / success message --}}
            @if(session('error'))
                <div class="alert">{{ session('error') }}</div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group">
                    <i class='bx bxs-envelope'></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-group">
                    <i class='bx bxs-key'></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <button type="submit">Login</button>
            </form>
        </div>
    </div>

</body>
</html>
