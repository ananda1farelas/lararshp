<?php

namespace App\Http\Controllers\Admin\Datamaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RasHewan;
use App\Models\JenisHewan;

class RasHewanController extends Controller
{
    public function index()
    {
        $ras = RasHewan::with('jenisHewan')->orderBy('idras_hewan')->get();
        return view('admin.datamaster.rashewan.index', compact('ras'));
    }

    public function create()
    {
        $jenis = JenisHewan::all();
        return view('admin.datamaster.rashewan.create', compact('jenis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ras' => 'required|string|max:100',
            'idjenis_hewan' => 'required|exists:jenis_hewan,idjenis_hewan',
        ]);

        RasHewan::create($request->only('nama_ras', 'idjenis_hewan'));

        return redirect()->route('admin.datamaster.rashewan.index')
                         ->with('success', 'Ras hewan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $ras = RasHewan::findOrFail($id);
        $jenis = JenisHewan::all();
        return view('admin.datamaster.rashewan.edit', compact('ras', 'jenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ras' => 'required|string|max:100',
            'idjenis_hewan' => 'required|exists:jenis_hewan,idjenis_hewan',
        ]);

        $ras = RasHewan::findOrFail($id);
        $ras->update($request->only('nama_ras', 'idjenis_hewan'));

        return redirect()->route('admin.datamaster.rashewan.index')
                         ->with('success', 'Ras hewan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $ras = RasHewan::findOrFail($id);
        $ras->delete();

        return redirect()->route('admin.datamaster.rashewan.index')
                         ->with('success', 'Ras hewan berhasil dihapus!');
    }

    public function delete($id)
    {
        $ras = RasHewan::findOrFail($id);
        return view('admin.datamaster.rashewan.delete', compact('ras'));
    }

    private function formatNamaRasHewan($nama)
    {
        return ucwords(strtolower($nama));
    }

    private function createRasHewan(array $data)
    {
        return RasHewan::create($data);
    }

    private function validateRasHewan(Request $request)
    {
        return $request->validate([
            'nama_ras' => 'required|string|max:100',
            'idjenis_hewan' => 'required|exists:jenis_hewan,idjenis_hewan',
        ]);
    }
}
