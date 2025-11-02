<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\KategoriKlinis;
use Illuminate\Http\Request;

class KategoriKlinisController extends Controller
{
    // Menampilkan semua kategori klinis
    public function index()
    {
        $kategoriklinis = KategoriKlinis::all();
        return view('admin.datamaster.kategoriklinis.index', compact('kategoriklinis'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('admin.datamaster.kategoriklinis.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|string|max:100',
        ]);

        KategoriKlinis::create($request->only('nama_kategori_klinis'));

        return redirect()
            ->route('admin.datamaster.kategoriklinis.index')
            ->with('success', 'Kategori klinis berhasil ditambahkan');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $kategoriklinis = KategoriKlinis::findOrFail($id);
        return view('admin.datamaster.kategoriklinis.edit', compact('kategoriklinis'));
    }

    // Menyimpan perubahan data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|string|max:100',
        ]);

        $kategoriklinis = KategoriKlinis::findOrFail($id);
        $kategoriklinis->update($request->only('nama_kategori_klinis'));

        return redirect()
            ->route('admin.datamaster.kategoriklinis.index')
            ->with('success', 'Kategori klinis berhasil diperbarui');
    }

    // Menghapus data
    public function destroy($id)
    {
        KategoriKlinis::destroy($id);

        return redirect()
            ->route('admin.datamaster.kategoriklinis.index')
            ->with('success', 'Kategori klinis berhasil dihapus');
    }

    public function delete($id)
    {
        $kategoriklinis = KategoriKlinis::findOrFail($id);
        return view('admin.datamaster.kategoriklinis.delete', compact('kategoriklinis'));
    }
}
