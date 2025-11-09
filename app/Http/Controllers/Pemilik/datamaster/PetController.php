<?php

namespace App\Http\Controllers\Pemilik\Datamaster;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\Pemilik;

class PetController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // pastikan user punya data pemilik
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();

        if (!$pemilik) {
            return redirect()->back()->with('error', 'Data pemilik tidak ditemukan.');
        }

        $pet = Pet::where('idpemilik', $pemilik->idpemilik)
                ->with(['ras'])
                ->get();

        return view('pemilik.datamaster.pet.index', compact('pemilik', 'pet'));
    }

}
