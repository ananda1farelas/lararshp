<?php

namespace App\Http\Controllers\Perawat\Datamaster;

use App\Models\RekamMedis;
use App\Models\TemuDokter;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RekamMedisController extends Controller
{
    // 🔹 Tampilkan semua data
    public function index()
    {
        $rekamMedis = RekamMedis::with(['temuDokter', 'dokter'])->get();
        return view('perawat.datamaster.rekammedis.index', compact('rekamMedis'));
    }

    // 🔹 Form tambah data
    public function create()
    {
        $temuDokter = TemuDokter::all();
        $dokter = RoleUser::whereHas('role', function($q) {
            $q->where('nama_role', 'Dokter');
        })->get();

        return view('perawat.datamaster.rekammedis.create', compact('temuDokter', 'dokter'));
    }
    // 🔹 Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'idreservasi_dokter' => 'required',
            'anamnesa' => 'required|string',
            'temuan_klinis' => 'required|string',
            'diagnosa' => 'required|string',
            'dokter_pemeriksa' => 'required',
        ]);

        // 🔹 Simpan data rekam medis baru
        $rekamMedis = RekamMedis::create([
            'idreservasi_dokter' => $request->idreservasi_dokter,
            'anamnesa' => $request->anamnesa,
            'temuan_klinis' => $request->temuan_klinis,
            'diagnosa' => $request->diagnosa,
            'dokter_pemeriksa' => $request->dokter_pemeriksa,
            'created_at' => now(),
        ]);

        // 🔁 Redirect ke form detail
        return redirect()
            ->route('perawat.datamaster.detailrekammedis.create', [
                'idrekam_medis' => $rekamMedis->idrekam_medis
            ])
            ->with('success', 'Rekam medis berhasil ditambahkan! Silakan isi detail tindakan atau terapi.');
    }

    // 🔹 Form edit
    public function edit($idrekam_medis)
    {
        $rekamMedis = RekamMedis::findOrFail($idrekam_medis);
        $temuDokter = TemuDokter::all();
        $dokter = RoleUser::whereHas('role', function($q) {
            $q->where('nama_role', 'Dokter');
        })->get();

        return view('perawat.datamaster.rekammedis.edit', compact('rekamMedis', 'temuDokter', 'dokter'));
    }

    // 🔹 Update data
    public function update(Request $request, $idrekam_medis)
    {
        $request->validate([
            'idreservasi_dokter' => 'required',
            'anamnesa' => 'required|string',
            'temuan_klinis' => 'required|string',
            'diagnosa' => 'required|string',
            'dokter_pemeriksa' => 'required',
        ]);

        $rekamMedis = RekamMedis::findOrFail($idrekam_medis);
        $rekamMedis->update([
            'idreservasi_dokter' => $request->idreservasi_dokter,
            'anamnesa' => $request->anamnesa,
            'temuan_klinis' => $request->temuan_klinis,
            'diagnosa' => $request->diagnosa,
            'dokter_pemeriksa' => $request->dokter_pemeriksa,
        ]);

        return redirect()->route('perawat.datamaster.rekammedis.index')->with('success', 'Data rekam medis berhasil diperbarui!');
    }

    // 🔹 Hapus data
    public function destroy($idrekam_medis)
    {
        $rekamMedis = RekamMedis::findOrFail($idrekam_medis);

        // 🔹 Hapus dulu semua detail yang terkait rekam medis ini
        $rekamMedis->detailRekamMedis()->delete();

        // 🔹 Baru hapus data rekam medis utamanya
        $rekamMedis->delete();

        return redirect()
            ->route('perawat.datamaster.rekammedis.index')
            ->with('success', 'Data rekam medis dan semua detail-nya berhasil dihapus!');
    }


    public function delete($idrekam_medis)
    {
        $rekamMedis = RekamMedis::findOrFail($idrekam_medis);
        return view('perawat.datamaster.rekammedis.delete', compact('rekamMedis'));
    }

    public function getReservasi($id)
    {
        $reservasi = TemuDokter::with(['pet', 'dokter'])
            ->where('idreservasi_dokter', $id)
            ->first();

        if (!$reservasi) {
            return response()->json(['error' => 'Reservasi tidak ditemukan'], 404);
        }

        return response()->json([
            'idpet' => $reservasi->pet->idpet,
            'nama_pet' => $reservasi->pet->nama,
            'id_dokter' => $reservasi->dokter->id,
            'nama_dokter' => $reservasi->dokter->nama,
            'tanggal' => $reservasi->tgl_reservasi ?? '-'
        ]);
    }

}
