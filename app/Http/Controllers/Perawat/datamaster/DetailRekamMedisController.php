<?php

namespace App\Http\Controllers\Perawat\Datamaster;

use App\Http\Controllers\Controller;
use App\Models\DetailRekamMedis;
use App\Models\RekamMedis;
use App\Models\KodeTindakanTerapi;
use App\Models\RoleUser;
use Illuminate\Http\Request;

class DetailRekamMedisController extends Controller
{
    public function index($idrekam_medis = null)
    {
        if ($idrekam_medis) {
            // kalau ada rekam medis, tampilkan detail berdasarkan itu
            $detailRekamMedis = DetailRekamMedis::where('idrekam_medis', $idrekam_medis)
                ->with(['rekamMedis', 'kodeTindakan'])
                ->get();
        } else {
            // kalau nggak ada id, tampilkan semua (fallback)
            $detailRekamMedis = DetailRekamMedis::with(['rekamMedis', 'kodeTindakan'])->get();
        }

        return view('perawat.datamaster.detailrekammedis.index', compact('detailRekamMedis', 'idrekam_medis'));
    }

    public function create(Request $request)
    {
        $id = $request->get('idrekam_medis'); // diambil dari URL ?idrekam_medis=7

        $rekamMedis = RekamMedis::find($id);
        if (!$rekamMedis) {
            abort(404, 'Data rekam medis tidak ditemukan');
        }

        $tindakan = KodeTindakanTerapi::all();

        $dokter = RoleUser::with('user')
            ->whereHas('role', fn($q) => $q->where('nama_role', 'Dokter'))
            ->get();

        return view('perawat.datamaster.detailrekammedis.create', compact('rekamMedis', 'tindakan', 'dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idrekam_medis' => 'required|exists:rekam_medis,idrekam_medis',
            'idkode_tindakan_terapi' => 'required|exists:kode_tindakan_terapi,idkode_tindakan_terapi',
            'detail' => 'required|string|max:255',
        ]);

        DetailRekamMedis::create($request->all());

        return redirect()->route('perawat.datamaster.rekammedis.index')
            ->with('success', 'Detail Rekam Medis berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit data tertentu.
     */
    public function edit($id)
    {
        $detailRekamMedis = DetailRekamMedis::findOrFail($id);
        $rekamMedis = RekamMedis::all();
        $kodeTindakan = KodeTindakanTerapi::all();

        return view('perawat.datamaster.detailrekammedis.edit', compact('detailRekamMedis', 'rekamMedis', 'kodeTindakan'));
    }

    /**
     * Update data ke database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'idrekam_medis' => 'required|exists:rekam_medis,idrekam_medis',
            'idkode_tindakan_terapi' => 'required|exists:kode_tindakan_terapi,idkode_tindakan_terapi',
            'detail' => 'required|string|max:255',
        ]);

        $detailRekamMedis = DetailRekamMedis::findOrFail($id);
        $detailRekamMedis->update($request->all());

        return redirect()->route('perawat.datamaster.detail_rekam_medis.index')
            ->with('success', 'Detail Rekam Medis berhasil diperbarui.');
    }

    /**
     * Hapus data dari database.
     */
    public function destroy($id)
    {
        $detailRekamMedis = DetailRekamMedis::findOrFail($id);
        $detailRekamMedis->delete();

        return redirect()
            ->route('perawat.datamaster.detailrekammedis.index')
            ->with('success', 'Detail Rekam Medis berhasil dihapus.');
    }

    public function delete($id)
    {
        $detailRekamMedis = DetailRekamMedis::findOrFail($id);
        return view('perawat.datamaster.detailrekammedis.delete', compact('detailRekamMedis'));
    }

    public function show($idrekam_medis)
    {
        $rekamMedis = RekamMedis::with(['temuDokter', 'dokter'])->findOrFail($idrekam_medis);
        $detailRekamMedis = DetailRekamMedis::with('kodeTindakan')
            ->where('idrekam_medis', $idrekam_medis)
            ->get();

        return view('perawat.datamaster.detailrekammedis.show', compact('rekamMedis', 'detailRekamMedis'));
    }

}
