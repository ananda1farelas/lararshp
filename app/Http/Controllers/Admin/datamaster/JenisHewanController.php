<?php

namespace App\Http\Controllers\Admin\datamaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JenisHewan;

class JenisHewanController extends Controller
{
    public function jenisHewan()
    {
        $jenis = JenisHewan::all();
        return view('admin.datamaster.jenis_hewan', compact('jenis'));
    }
}
