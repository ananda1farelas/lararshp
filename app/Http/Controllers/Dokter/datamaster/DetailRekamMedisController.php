<?php

namespace App\Http\Controllers\Dokter\datamaster;

use App\Http\Controllers\Controller;
use App\Models\DetailRekamMedis;
use App\Models\RekamMedis;

class DetailRekamMedisController extends Controller
{
    public function show($idrekam_medis)
    {
        $rekamMedis = RekamMedis::with(['temuDokter', 'dokter'])->findOrFail($idrekam_medis);
        $detailRekamMedis = DetailRekamMedis::with('kodeTindakan')
            ->where('idrekam_medis', $idrekam_medis)
            ->get();

        return view('dokter.datamaster.detailrekammedis.show', compact('rekamMedis', 'detailRekamMedis'));
    }
}
