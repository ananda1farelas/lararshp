<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RasHewanController extends Controller
{
    public function index()
    {
        $ras = DB::table('ras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select('ras_hewan.*', 'jenis_hewan.nama_jenis_hewan')
            ->get();

        return view('admin.datamaster.ras_hewan.index', compact('ras'));
    }
}
