<?php

namespace App\Http\Controllers\Admin\Datamaster;

use App\Http\Controllers\Controller;
use App\Models\KategoriKlinis;
use Illuminate\Http\Request;

class KategoriKlinisController extends Controller
{
    // Menampilkan semua kategori klinis
    public function index()
    {
        $kategoriklinis = KategoriKlinis::orderBy('idkategori_klinis', 'asc')->get();
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
        // Validasi input
        $validatedData = $this->validateKategoriKlinis($request);

        // Format nama kategori klinis
        $validatedData['nama_kategori_klinis'] = $this->formatNamaKategoriKlinis($validatedData['nama_kategori_klinis']);

        // Simpan data menggunakan helper
        $this->createKategoriKlinis($validatedData);

        return redirect()
            ->route('admin.datamaster.kategoriklinis.index')
            ->with('success', 'Kategori klinis berhasil ditambahkan!');
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
        $validatedData = $this->validateKategoriKlinis($request);
        $validatedData['nama_kategori_klinis'] = $this->formatNamaKategoriKlinis($validatedData['nama_kategori_klinis']);

        $kategoriklinis = KategoriKlinis::findOrFail($id);
        $kategoriklinis->update($validatedData);

        return redirect()
            ->route('admin.datamaster.kategoriklinis.index')
            ->with('success', 'Kategori klinis berhasil diperbarui!');
    }

    // Menghapus data
    public function destroy($id)
    {
        KategoriKlinis::findOrFail($id)->delete();

        return redirect()
            ->route('admin.datamaster.kategoriklinis.index')
            ->with('success', 'Kategori klinis berhasil dihapus!');
    }

    public function delete($id)
    {
        $kategoriklinis = KategoriKlinis::findOrFail($id);
        return view('admin.datamaster.kategoriklinis.delete', compact('kategoriklinis'));
    }

    /* =====================================
       HELPER FUNCTIONS
    ===================================== */

    /**
     * Validasi input kategori klinis.
     */
    private function validateKategoriKlinis(Request $request)
    {
        return $request->validate([
            'nama_kategori_klinis' => 'required|string|max:100',
        ]);
    }

    /**
     * Simpan data kategori klinis ke database.
     */
    private function createKategoriKlinis(array $data)
    {
        return KategoriKlinis::create($data);
    }

    /**
     * Format nama kategori klinis jadi kapital di setiap kata.
     */
    private function formatNamaKategoriKlinis(string $nama)
    {
        return ucwords(strtolower($nama));
    }
}
