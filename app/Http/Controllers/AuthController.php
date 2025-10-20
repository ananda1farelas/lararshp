<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Ambil data user + role
        $user = DB::table('user')
            ->join('role_user', 'user.iduser', '=', 'role_user.iduser')
            ->join('role', 'role_user.idrole', '=', 'role.idrole')
            ->select('user.*', 'role.nama_role')
            ->where('user.email', $request->email)
            ->where('role_user.status', 1)
            ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Email atau password salah!']);
        }

        // Simpan data ke session
        Session::put('user_id', $user->iduser);
        Session::put('user_name', $user->nama);
        Session::put('user_email', $user->email);
        Session::put('user_role', trim(strtolower($user->nama_role)));

        // Arahkan ke dashboard sesuai role
        switch (Session::get('user_role')) {
            case 'administrator':
                return redirect()->route('admin.dashboard');
            case 'dokter':
                return redirect()->route('dokter.dashboard');
            case 'perawat':
                return redirect()->route('perawat.dashboard');
            case 'resepsionis':
                return redirect()->route('resepsionis.dashboard');
            case 'pemilik':
                return redirect()->route('pemilik.dashboard');
            default:
                return redirect('/login')->withErrors(['email' => 'Role tidak dikenal!']);
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
