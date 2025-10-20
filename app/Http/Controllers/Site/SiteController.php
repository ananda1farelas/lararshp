<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('tampilan.homepage');
    }

    public function sejarah()
    {
        return view('tampilan.sejarah');
    }

    public function visi()
    {
        return view('tampilan.visi');
    }

    public function layanan()
    {
        return view('tampilan.layanan');
    }

    public function struktur()
    {
        return view('tampilan.struktur');
    }

    public function login()
    {
        return view('tampilan.login');
    }
}
