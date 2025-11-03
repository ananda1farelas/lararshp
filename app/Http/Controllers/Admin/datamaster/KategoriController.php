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
        // Panggil helper validasi
        $validatedData = $this->validateKategori($request);

        // Format nama kategori
        $validatedData['nama_kategori'] = $this->formatNamaKategori($validatedData['nama_kategori']);

        // Panggil helper buat simpan data
        $this->createKategori($validatedData);

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
        // Validasi
        $validatedData = $this->validateKategori($request);

        // Format nama kategori
        $validatedData['nama_kategori'] = $this->formatNamaKategori($validatedData['nama_kategori']);

        // Update data
        $kategori = Kategori::findOrFail($id);
        $kategori->update($validatedData);

        return redirect()
            ->route('admin.datamaster.kategori.index')
            ->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();

        return redirect()
            ->route('admin.datamaster.kategori.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }

    public function delete($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.datamaster.kategori.delete', compact('kategori'));
    }

    /* ===========================
       HELPER FUNCTIONS
    =========================== */

    /**
     * Validasi data kategori.
     */
    private function validateKategori(Request $request)
    {
        return $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);
    }

    /**
     * Simpan kategori baru ke database.
     */
    private function createKategori(array $data)
    {
        return Kategori::create($data);
    }

    /**
     * Format nama kategori jadi huruf kapital di awal kata.
     */
    private function formatNamaKategori($nama)
    {
        return ucwords(strtolower($nama));
    }
}
