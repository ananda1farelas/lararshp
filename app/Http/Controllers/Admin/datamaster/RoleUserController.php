<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleUserController extends Controller
{
    public function index()
    {
        $roleUsers = DB::table('role_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->join('role', 'role_user.idrole', '=', 'role.idrole')
            ->select('role_user.*', 'user.nama as user_name', 'role.nama_role as role_name')
            ->get();

        return view('admin.datamaster.role_user.index', compact('roleUsers'));
    }

    public function create()
    {
        $users = DB::table('user')->get();
        $roles = DB::table('role')->get();

        return view('admin.datamaster.role_user.create', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'idrole' => 'required|exists:role,idrole',
        ]);

        DB::table('role_user')->insert([
            'iduser' => $request->iduser,
            'idrole' => $request->idrole,
        ]);

        return redirect()->route('admin.datamaster.role_user.index')
            ->with('success', 'Role user berhasil ditambahkan!');
    }

    public function edit($idrole_user)
    {
        $roleUser = DB::table('role_user')->where('idrole_user', $idrole_user)->first();
        $users = DB::table('user')->get();
        $roles = DB::table('role')->get();

        return view('admin.datamaster.role_user.edit', compact('roleUser', 'users', 'roles'));
    }

    public function update(Request $request, $idrole_user)
    {
        $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'idrole' => 'required|exists:role,idrole',
        ]);

        DB::table('role_user')
            ->where('idrole_user', $idrole_user)
            ->update([
                'iduser' => $request->iduser,
                'idrole' => $request->idrole,
            ]);

        return redirect()->route('admin.datamaster.role_user.index')
            ->with('success', 'Role user berhasil diperbarui!');
    }

    public function destroy($idrole_user)
    {
        DB::table('role_user')->where('idrole_user', $idrole_user)->delete();

        return redirect()->route('admin.datamaster.role_user.index')
            ->with('success', 'Role user berhasil dihapus!');
    }

    public function delete($idrole_user)
    {
        // ambil data role_user yang mau dihapus
        $roleUser = DB::table('role_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->join('role', 'role_user.idrole', '=', 'role.idrole')
            ->select('role_user.*', 'user.nama as nama_user', 'role.nama_role as nama_role')
            ->where('idrole_user', $idrole_user)
            ->first();

        if (!$roleUser) {
            return redirect()->route('admin.datamaster.role_user.index')->withErrors(['Data tidak ditemukan']);
        }

        // tampilkan view konfirmasi
        return view('admin.datamaster.role_user.delete', compact('roleUser'));
    }

    private function formatNamaRole($namaRole)
    {
        // Hapus spasi di awal dan akhir
        $namaRole = trim($namaRole);
        // Ubah ke huruf kecil semua
        $namaRole = strtolower($namaRole);
        // Ubah huruf pertama setiap kata menjadi kapital
        $namaRole = ucwords($namaRole);
        return $namaRole;
    }

    private function validateRoleUser(Request $request)
    {
        return $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'idrole' => 'required|exists:role,idrole',
        ]);
    }

    private function createRoleUser(array $data)
    {
        return DB::table('role_user')->insert($data);
    }

}
