<?php

namespace App\Http\Controllers\Perawat\datamaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemuDokter;

class TemuDokterController extends Controller
{
    public function index()
    {
        $temuDokter = TemuDokter::with(['pet', 'roleUser'])->get();
        return view('perawat.datamaster.temudokter.index', compact('temuDokter'));
    }

}
