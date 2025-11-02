<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Pemilik;
use App\Models\Pet;
use App\Models\TemuDokter;

class ResepsionisDashboardController extends Controller
{
    public function dashboard()
    {
        return view('resepsionis.dashboard', [
            'totalPemilik'      => Pemilik::count(),
            'totalPet'          => Pet::count(),
            'totalTemuDokter' => TemuDokter::where('status', 'menunggu')
                ->count(),
        ]);
    }

    public function index()
    {
        return view('resepsionis.datamaster.index');
    }
}
