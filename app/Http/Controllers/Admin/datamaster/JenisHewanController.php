<?php

namespace App\Http\Controllers\Admin\Datamaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisHewan;

class JenisHewanController extends Controller
{
    public function index()
    {
        $jenis = JenisHewan::orderBy('idjenis_hewan', 'asc')->get();
        return view('admin.datamaster.jenishewan.index', compact('jenis'));
    }

    public function create()
    {
        return view('admin.datamaster.jenishewan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100',
        ]);

        JenisHewan::create([
            'nama_jenis_hewan' => $request->nama_jenis_hewan,
        ]);

        return redirect()->route('admin.datamaster.jenishewan.index')
                         ->with('success', 'Jenis hewan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jenis = JenisHewan::findOrFail($id);
        return view('admin.datamaster.jenishewan.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100',
        ]);

        $jenis = JenisHewan::findOrFail($id);
        $jenis->update([
            'nama_jenis_hewan' => $request->nama_jenis_hewan,
        ]);

        return redirect()->route('admin.datamaster.jenishewan.index')
                         ->with('success', 'Jenis hewan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        JenisHewan::findOrFail($id)->delete();

        return redirect()->route('admin.datamaster.jenishewan.index')
                         ->with('success', 'Jenis hewan berhasil dihapus!');
    }

    public function delete($id)
    {
        $jenis = JenisHewan::findOrFail($id);
        return view('admin.datamaster.jenishewan.delete', compact('jenis'));
    }
}
