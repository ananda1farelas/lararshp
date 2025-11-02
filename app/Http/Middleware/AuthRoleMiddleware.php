<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthRoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // 🧱 Cek apakah user udah login
        if (!Session::has('user_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        $userRoleId = Session::get('user_role'); // 👈 sesuai yang diset di LoginController

        // 🧠 Kalau route ini butuh role tertentu
        if (!empty($roles)) {
            if (!in_array($userRoleId, $roles)) { // 👈 bandingin id, bukan nama
                // 🚧 Hindari loop redirect ke dashboard yang salah
                if ($request->routeIs(
                    'admin.dashboard',
                    'dokter.dashboard',
                    'perawat.dashboard',
                    'resepsionis.dashboard',
                    'pemilik.dashboard'
                )) {
                    Session::flush();
                    return redirect('/login')->withErrors(['akses' => 'Sesi berakhir atau role tidak sesuai.']);
                }

                // 🚀 Arahkan ke dashboard sesuai role user
                switch ($userRoleId) {
                    case 1:
                        return redirect()->route('admin.dashboard');
                    case 2:
                        return redirect()->route('dokter.dashboard');
                    case 3:
                        return redirect()->route('perawat.dashboard');
                    case 4:
                        return redirect()->route('resepsionis.dashboard');
                    case 5:
                        return redirect()->route('pemilik.dashboard');
                    default:
                        Session::flush();
                        return redirect('/login')->withErrors(['akses' => 'Role tidak dikenali.']);
                }
            }
        }

        // ✅ Semua aman
        return $next($request);
    }
}
