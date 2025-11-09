<?php

namespace App\Http\Controllers\Pemilik\Datamaster;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\RekamMedis;
use App\Models\Pemilik;

class RekamMedisController extends Controller
{
    // Menampilkan semua rekam medis milik pemilik login
    public function index()
    {
        $user = Auth::user();

        // Ambil data pemilik berdasarkan user login
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();
        if (!$pemilik) {
            abort(403, 'Data pemilik tidak ditemukan.');
        }

        // Ambil semua rekam medis milik hewan pemilik login
        $rekamMedis = RekamMedis::with(['temuDokter.pet', 'dokter.user'])
            ->whereHas('temuDokter.pet', function ($query) use ($pemilik) {
                $query->where('idpemilik', $pemilik->idpemilik);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pemilik.datamaster.rekammedis.index', compact('rekamMedis'));
    }

    // Menampilkan detail rekam medis tertentu
    public function show($idrekam_medis)
    {
        $user = Auth::user();

        $pemilik = Pemilik::where('iduser', $user->iduser)->first();
        if (!$pemilik) {
            abort(403, 'Data pemilik tidak ditemukan.');
        }

        // Ambil satu rekam medis beserta semua relasinya
        $rekamMedis = RekamMedis::with([
                'temuDokter.pet',
                'dokter.user',
                'detailRekamMedis.kodeTindakan'
            ])
            ->findOrFail($idrekam_medis);

        // Pastikan pemilik yang login benar-benar pemilik hewan tersebut
        if ($rekamMedis->temuDokter->pet->idpemilik != $pemilik->idpemilik) {
            abort(403, 'Anda tidak berhak mengakses rekam medis ini.');
        }

        return view('pemilik.datamaster.rekammedis.show', compact('rekamMedis'));
    }
}
