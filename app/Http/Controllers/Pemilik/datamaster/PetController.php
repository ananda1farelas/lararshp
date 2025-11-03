<?php

namespace App\Http\Controllers\Pemilik\Datamaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Pemilik;

class PetController extends Controller
{
    public function show($id)
    {
        $user = auth()->user();
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();

        $pet = Pet::where('idpet', $id)
                  ->where('idpemilik', $pemilik->idpemilik)
                  ->with(['ras'])
                  ->firstOrFail();

        return view('pemilik.datamaster.pet.show', compact('pet'));
    }
}
