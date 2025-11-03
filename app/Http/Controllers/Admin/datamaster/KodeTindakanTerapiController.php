<?php

namespace App\Http\Controllers\Admin\Datamaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KodeTindakanTerapi;
use App\Models\Kategori;
use App\Models\KategoriKlinis;

class KodeTindakanTerapiController extends Controller
{
    public function index()
    {
        $kodeTindakanTerapi = KodeTindakanTerapi::with(['kategori', 'kategoriKlinis'])->get();
        $kategori = Kategori::all();
        $kategoriKlinis = KategoriKlinis::all();

        return view('admin.datamaster.kodetindakanterapi.index', compact('kodeTindakanTerapi', 'kategori', 'kategoriKlinis'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $kategoriKlinis = KategoriKlinis::all();
        return view('admin.datamaster.kodetindakanterapi.create', compact('kategori', 'kategoriKlinis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:50',
            'deskripsi_tindakan_terapi' => 'required|string|max:255',
            'idkategori' => 'required|integer',
            'idkategori_klinis' => 'required|integer',
        ]);

        KodeTindakanTerapi::create([
            'kode' => $request->kode,
            'deskripsi_tindakan_terapi' => $request->deskripsi_tindakan_terapi,
            'idkategori' => $request->idkategori,
            'idkategori_klinis' => $request->idkategori_klinis,
        ]);

        return redirect()
            ->route('admin.datamaster.kodetindakanterapi.index')
            ->with('success', 'Kode tindakan terapi berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $kode = KodeTindakanTerapi::findOrFail($id);
        $kategori = Kategori::all();
        $kategoriKlinis = KategoriKlinis::all();
        return view('admin.datamaster.kodetindakanterapi.edit', compact('kode', 'kategori', 'kategoriKlinis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi_tindakan_terapi' => 'required|string|max:255',
            'idkategori' => 'required',
            'idkategori_klinis' => 'required',
        ]);

        $kode = KodeTindakanTerapi::findOrFail($id);
        $kode->update([
            'deskripsi_tindakan_terapi' => $request->deskripsi_tindakan_terapi,
            'idkategori' => $request->idkategori,
            'idkategori_klinis' => $request->idkategori_klinis,
        ]);

        return redirect()
            ->route('admin.datamaster.kodetindakanterapi.index')
            ->with('success', 'Kode tindakan terapi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        KodeTindakanTerapi::destroy($id);

        return redirect()
            ->route('admin.datamaster.kodetindakanterapi.index')
            ->with('success', 'Kode tindakan terapi berhasil dihapus!');
    }

    public function delete($id)
    {
        $kode = KodeTindakanTerapi::findOrFail($id);
        return view('admin.datamaster.kodetindakanterapi.delete', compact('kode'));
    }

    private function validateKodeTindakanTerapi(Request $request)
    {
        return $request->validate([
            'kode' => 'required|string|max:50',
            'deskripsi_tindakan_terapi' => 'required|string|max:255',
            'idkategori' => 'required|integer',
            'idkategori_klinis' => 'required|integer',
        ]);
    }

    private function createKodeTindakanTerapi(array $data)
    {
        return KodeTindakanTerapi::create($data);
    }

    private function formatDeskripsiTindakanTerapi($deskripsi)
    {
        return ucwords(strtolower($deskripsi));
    }
}
