<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\TemuDokter;
use App\Models\RekamMedis;

class PerawatDashboardController extends Controller
{
    public function dashboard()
    {
        return view('perawat.dashboard', [
        'totalTemuDokter' => TemuDokter::whereDate('waktu_daftar', now())
            ->where('status', 'menunggu')
            ->count(),
            'totalRekamMedis'   => RekamMedis::count(),
        ]);
    }

    public function index()
    {
        return view('perawat.datamaster.index');
    }
}
