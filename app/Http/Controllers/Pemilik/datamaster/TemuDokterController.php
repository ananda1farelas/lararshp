<?php

namespace App\Http\Controllers\Pemilik\datamaster;

use App\Http\Controllers\Controller;
use App\Models\TemuDokter;
use App\Models\Pemilik;
use Illuminate\Support\Facades\Auth;



class TemuDokterController extends Controller
{
    public function index($idreservasi_dokter = null)
    {
        $user = Auth::user();

        // cari pemilik berdasarkan user login
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();

        if (!$pemilik) {
            abort(403, 'Data pemilik tidak ditemukan.');
        }

        // ambil semua temu dokter milik pemilik login
        $antrian = TemuDokter::with(['pet', 'roleUser.user'])
            ->whereHas('pet', function ($query) use ($pemilik) {
                $query->where('idpemilik', $pemilik->idpemilik);
            })
            ->orderBy('waktu_daftar', 'desc')
            ->get();

        // kalau user klik salah satu antrian, ambil detailnya
        $reservasi = null;
        if ($idreservasi_dokter) {
            $reservasi = $antrian->firstWhere('idreservasi_dokter', $idreservasi_dokter);

            if (!$reservasi) {
                abort(403, 'Anda tidak berhak mengakses data ini.');
            }
        }

        return view('pemilik.datamaster.temudokter.index', compact('antrian', 'reservasi'));
    }
}
