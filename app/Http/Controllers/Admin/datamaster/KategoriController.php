<?php

namespace App\Http\Controllers\Admin\datamaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function kategori()
    {
        return view('admin.datamaster.kategori');
    }
}
