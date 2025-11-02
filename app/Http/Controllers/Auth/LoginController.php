<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Role;   
use App\Models\RoleUser;
use Validator;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::with(['roleUser' => function ($query) {
            $query->where('status', 1);
        }, 'roleUser.role'])->
        where('email', $request->input('email'))
        ->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return redirect('/login')
                ->withErrors(['login' => 'Email anda tidak ditemukan'])
                ->withInput();
        }

        $namaRole = Role::where ('idrole', $user->roleUser[0]->idrole ?? null)->first();

        Auth::login($user);

        $request->session()->put([
            'user_id' => $user->iduser,
            'user_name' => $user->nama,
            'user_email' => $user->email,
            'user_role' => $user->roleUser[0]->idrole ?? 'user',
            'user_role_name' => $namaRole->nama_role ?? 'User',
            'user_status' => $user->roleUser[0]->status ?? 'active',
        ]);

        $userRole = $user->roleUser[0]->idrole ?? null;

        switch ($userRole) {
            case 1:
                return redirect()->route('admin.dashboard')->with('success', 'Berhasil login sebagai Admin.');
            case 2:
                return redirect()->route('dokter.dashboard')->with('success', 'Berhasil login sebagai Dokter.');
            case 3:
                return redirect()->route('perawat.dashboard')->with('success', 'Berhasil login sebagai Perawat.');
            case 4:
                return redirect()->route('resepsionis.dashboard')->with('success', 'Berhasil login sebagai Resepsionis.');
            case 5:
                return redirect()->route('pemilik.dashboard')->with('success', 'Berhasil login sebagai Pemilik.');
            default:
                Auth::logout();
                $request->session()->flush();
                return redirect('/login')->withErrors(['akses' => 'Role tidak dikenali.']);
        }
    }

    public function logout(Request $request)
    {
        // Hapus semua data session
        Session::flush();

        // Regenerasi session ID untuk keamanan (opsional tapi disarankan)
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Arahkan ke halaman login
        return redirect('/login')->with('success', 'Berhasil logout.');
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
