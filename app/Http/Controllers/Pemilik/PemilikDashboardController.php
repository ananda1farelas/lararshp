<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pet;
use App\Models\TemuDokter;
use App\Models\RekamMedis;

class PemilikDashboardController extends Controller
{
    public function dashboard()
    {
        // ambil id pemilik dari user yang login
        $idPemilik = Auth::user()->pemilik->idpemilik ?? null;

        if (!$idPemilik) {
            // kalo user belum punya data pemilik, kasih default 0
            return view('pemilik.dashboard', [
                'totalPet' => 0,
                'totalTemuDokter' => 0,
                'totalRekamMedis' => 0,
            ]);
        }

        // Ambil semua id pet milik pemilik ini
        $petIds = Pet::where('idpemilik', $idPemilik)->pluck('idpet');

        return view('pemilik.dashboard', [
            // total hewan peliharaan pemilik
            'totalPet' => $petIds->count(),

            // total temu dokter milik hewan-hewan itu
            'totalTemuDokter' => TemuDokter::whereIn('idpet', $petIds)->count(),

            // total rekam medis yang berasal dari temu dokter milik pemilik ini
            'totalRekamMedis' => RekamMedis::whereIn(
                'idreservasi_dokter',
                TemuDokter::whereIn('idpet', $petIds)->pluck('idreservasi_dokter')
            )->count(),
        ]);
    }
}
