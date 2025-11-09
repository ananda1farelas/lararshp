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
        // Panggil helper validasi
        $validatedData = $this->validateJenisHewan($request);

        // Format nama jenis hewan
        $validatedData['nama_jenis_hewan'] = $this->formatNamaJenisHewan($validatedData['nama_jenis_hewan']);

        // Simpan data menggunakan helper create
        $this->createJenisHewan($validatedData);

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
        $validatedData = $this->validateJenisHewan($request);

        $validatedData['nama_jenis_hewan'] = $this->formatNamaJenisHewan($validatedData['nama_jenis_hewan']);

        $jenis = JenisHewan::findOrFail($id);
        $jenis->update($validatedData);

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

    private function validateJenisHewan(Request $request)
    {
        return $request->validate([
            'nama_jenis_hewan' => 'required|string|min:1|max:100',
        ]);
    }

    private function createJenisHewan(array $data)
    {
        return JenisHewan::create($data);
    }

    private function formatNamaJenisHewan($nama)
    {
        return ucwords(strtolower($nama));
    }
}
