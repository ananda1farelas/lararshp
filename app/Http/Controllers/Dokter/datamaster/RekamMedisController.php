<?php

namespace App\Http\Controllers\Dokter\datamaster;

use App\Http\Controllers\Controller;
use App\Models\RekamMedis;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekamMedis = RekamMedis::with(['temuDokter', 'dokter'])->get();
        return view('perawat.datamaster.rekammedis.index', compact('rekamMedis'));
    }
}
