<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\TemuDokter;
use App\Models\RekamMedis;

class DokterDashboardController extends Controller
{
    public function dashboard()
    {
        return view('dokter.dashboard', [
        'totalTemuDokter' => TemuDokter::whereDate('waktu_daftar', now())
            ->where('status', 'menunggu')
            ->count(),
        'totalRekamMedis'   => RekamMedis::count(),
        ]);
    }

    public function index()
    {
        return view('dokter.datamaster.index');
    }
}
