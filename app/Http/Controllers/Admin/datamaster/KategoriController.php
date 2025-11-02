<?php

namespace App\Http\Controllers\Admin\Datamaster;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::orderBy('idkategori', 'asc')->get();
        return view('admin.datamaster.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.datamaster.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()
            ->route('admin.datamaster.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.datamaster.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()
            ->route('admin.datamaster.kategori.index')
            ->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()
            ->route('admin.datamaster.kategori.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }

    public function delete($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.datamaster.kategori.delete', compact('kategori'));
    }
}
