<?php

namespace App\Http\Controllers\Dokter\datamaster;

use App\Http\Controllers\Controller;
use App\Models\TemuDokter;

class TemuDokterController extends Controller
{
    public function index()
    {
        $temuDokter = TemuDokter::with(['pet', 'roleUser'])->get();
        return view('dokter.datamaster.temudokter.index', compact('temuDokter'));
    }
}
