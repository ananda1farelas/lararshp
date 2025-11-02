<?php

namespace App\Http\Controllers\Admin\Datamaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Menampilkan daftar role
     */
    public function index()
    {
        $roles = DB::table('role')->orderBy('idrole')->get();
        return view('admin.datamaster.role.index', compact('roles'));
    }

    /**
     * Tampilkan form tambah role
     */
    public function create()
    {
        return view('admin.datamaster.role.create');
    }

    /**
     * Simpan role baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_role' => 'required|string|max:100',
        ]);

        DB::table('role')->insert([
            'nama_role' => $request->nama_role,
        ]);

        return redirect()->route('admin.datamaster.role.index')
                         ->with('success', 'Role berhasil ditambahkan!');
    }

    /**
     * Form edit role
     */
    public function edit($idrole)
    {
        $role = DB::table('role')->where('idrole', $idrole)->first();
        if (!$role) {
            abort(404);
        }
        return view('admin.datamaster.role.edit', compact('role'));
    }

    /**
     * Update data role
     */
    public function update(Request $request, $idrole)
    {
        $request->validate([
            'nama_role' => 'required|string|max:100',
        ]);

        DB::table('role')
            ->where('idrole', $idrole)
            ->update([
                'nama_role' => $request->nama_role,
            ]);

        return redirect()->route('admin.datamaster.role.index')
                         ->with('success', 'Role berhasil diperbarui!');
    }

    /**
     * Hapus data role
     */
    public function destroy($idrole)
    {
        DB::table('role')->where('idrole', $idrole)->delete();

        return redirect()->route('admin.datamaster.role.index')
                         ->with('success', 'Role berhasil dihapus!');
    }

    public function delete($idrole)
    {
        $role = DB::table('role')->where('idrole', $idrole)->first();
        if (!$role) {
            abort(404);
        }
        return view('admin.datamaster.role.delete', compact('role'));
    }
}
