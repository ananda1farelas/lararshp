<?php

namespace App\Http\Controllers\Resepsionis\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\Pemilik;
use App\Models\User;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::with('user')->orderBy('idpemilik', 'asc')->get();
        return view('resepsionis.datamaster.pemilik.index', compact('pemilik'));
    }

    public function create()
    {
        $users = User::all();
        return view('resepsionis.datamaster.pemilik.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_wa' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'iduser' => 'required|exists:user,iduser',
        ]);

        Pemilik::create($request->all());

        return redirect()->route('resepsionis.datamaster.pemilik.index')
            ->with('success', 'Data pemilik berhasil ditambahkan!');
    }

    public function edit($idpemilik)
    {
        $pemilik = Pemilik::findOrFail($idpemilik);
        $users = User::all();
        return view('resepsionis.datamaster.pemilik.edit', compact('pemilik', 'users'));
    }

    public function update(Request $request, $idpemilik)
    {
        $request->validate([
            'no_wa' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'iduser' => 'required|exists:user,iduser',
        ]);

        $pemilik = Pemilik::findOrFail($idpemilik);
        $pemilik->update($request->all());

        return redirect()->route('resepsionis.datamaster.pemilik.index')
            ->with('success', 'Data pemilik berhasil diperbarui!');
    }

    public function destroy($idpemilik)
    {
        $pemilik = Pemilik::findOrFail($idpemilik);
        $pemilik->delete();

        return redirect()->route('resepsionis.datamaster.pemilik.index')
            ->with('success', 'Data pemilik berhasil dihapus!');
    }

    public function delete($idpemilik)
    {
        $pemilik = Pemilik::findOrFail($idpemilik);
        return view('resepsionis.datamaster.pemilik.delete', compact('pemilik'));
    }
}
