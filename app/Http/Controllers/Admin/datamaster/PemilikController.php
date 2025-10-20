<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    public function index()
    {
        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.*', 'user.nama as nama_user', 'user.email')
            ->get();

        return view('admin.datamaster.pemilik.index', compact('pemilik'));
    }
}
