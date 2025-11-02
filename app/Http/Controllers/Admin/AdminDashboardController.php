<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Pet;
use App\Models\JenisHewan;
use App\Models\RasHewan;
use App\Models\Kategori;
use App\Models\KategoriKlinis;
use App\Models\KodeTindakanTerapi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalRole'                 => Role::count(),
            'totalRoleUser'             => RoleUser::count(),
            'totalPet'                  => Pet::count(),
            'totalJenis'                => JenisHewan::count(),
            'totalRas'                  => RasHewan::count(),
            'TotalKategori'             => Kategori::count(),
            'TotalKategoriKlinis'       => KategoriKlinis::count(),
            'TotalKodeTindakanTerapi'   => KodeTindakanTerapi::count(),
        ]);
    }

        public function index()
    {
        return view('admin.datamaster.index');
    }
}
