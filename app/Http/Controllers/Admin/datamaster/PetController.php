<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    public function pet()
    {
        $pets = DB::table('pet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('jenis_hewan', 'pet.idjenis', '=', 'jenis_hewan.idjenis')
            ->join('ras_hewan', 'pet.idras', '=', 'ras_hewan.idras')
            ->select(
                'pet.*',
                'pemilik.nama_pemilik',
                'jenis_hewan.nama_jenis',
                'ras_hewan.nama_ras'
            )
            ->get();

        return view('admin.datamaster.pet.index', compact('pets'));
    }
}
