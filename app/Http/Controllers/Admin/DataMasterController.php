<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DataMasterController extends Controller
{
    public function index()
    {
        return view('admin.datamaster.index');
    }

    public function role()
    {
        $roles = DB::table('role')->get();
        return view('admin.datamaster.role', compact('roles'));
    }

    public function roleuser()
    {
        $roleUsers = DB::table('role_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->join('role', 'role_user.idrole', '=', 'role.idrole')
            ->select('role_user.*', 'user.nama as user_name', 'role.nama_role as role_name')
            ->get();

        return view('admin.datamaster.role_user', compact('roleUsers'));
    }

    public function jenisHewan()
    {
        $jenis = DB::table('jenis_hewan')->get();
        return view('admin.datamaster.jenis_hewan', compact('jenis'));
    }

    public function rasHewan()
    {
        $ras = DB::table('ras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select('ras_hewan.*', 'jenis_hewan.nama_jenis_hewan')
            ->get();

        return view('admin.datamaster.ras_hewan', compact('ras'));
    }

    public function kategori()
    {
        $kategori = DB::table('kategori')->get();
        return view('admin.datamaster.kategori', compact('kategori'));
    }

    public function kategoriKlinis()
    {
        $kategoriKlinis = DB::table('kategori_klinis')->get();
        return view('admin.datamaster.kategori_klinis', compact('kategoriKlinis'));
    }


    
}
