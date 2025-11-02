<?php

namespace App\Http\Controllers\Resepsionis\Datamaster;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\TemuDokter;
use App\Models\Pet;
use App\Models\RoleUser;

class TemuDokterController extends Controller
{
    public function index()
    {
        $temuDokter = TemuDokter::with(['pet', 'roleUser'])->get();
        return view('resepsionis.datamaster.temudokter.index', compact('temuDokter'));
    }

    public function create()
    {
        // Ambil semua data pet
        $pet = DB::table('pet')->get();

        // Ambil semua dokter (role id = 2)
        $dokter = DB::table('user')
            ->join('role_user', 'user.iduser', '=', 'role_user.iduser')
            ->where('role_user.idrole', 2)
            ->select('user.*', 'role_user.idrole_user')
            ->get();

        // Ambil nomor urut terakhir hari ini
        $lastNumber = DB::table('temu_dokter')
            ->whereDate('waktu_daftar', now()->toDateString())
            ->max('no_urut');

        // Tambahkan 1 untuk nomor berikutnya
        $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

        // Kirim semua data ke view
        return view('resepsionis.datamaster.temudokter.create', compact('pet', 'dokter', 'nextNumber'));
    }

    public function store(Request $request)
    {
        // 🧱 Validasi input
        $validated = $request->validate([
            'waktu_daftar' => 'required|date',
            'status' => 'required',
            'idpet' => 'required|exists:pet,idpet',
            'idrole_user' => 'required|exists:role_user,idrole_user',
        ]);


        $today = now()->toDateString();

        $lastNumber =TemuDokter::whereDate('waktu_daftar', $today)
            ->max('no_urut');

        $newNumber = $lastNumber ? $lastNumber + 1 : 1;

        TemuDokter::create([
            'no_urut' => $newNumber,
            'waktu_daftar' => $validated['waktu_daftar'],
            'status' => $validated['status'],
            'idpet' => $validated['idpet'],
            'idrole_user' => $validated['idrole_user'],
        ]);

        return redirect()->route('resepsionis.datamaster.temudokter.index')
            ->with('success', 'Data temu dokter berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $temu = TemuDokter::findOrFail($id);
        $pet = Pet::all();
        $dokter = DB::table('user')
            ->join('role_user', 'user.iduser', '=', 'role_user.iduser')
            ->where('role_user.idrole', 2)
            ->select('user.*', 'role_user.idrole_user')
            ->get();

        return view('resepsionis.datamaster.temudokter.edit', compact('temu', 'pet', 'dokter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_urut' => 'required',
            'waktu_daftar' => 'required|date',
            'status' => 'required',
            'idpet' => 'required|exists:pet,idpet',
            'idrole_user' => 'required|exists:role_user,idrole_user',
        ]);

        $temu = TemuDokter::findOrFail($id);
        $temu->update($request->all());

        return redirect()->route('resepsionis.datamaster.temudokter.index')
                         ->with('success', 'Data Temu Dokter berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $temu = TemuDokter::findOrFail($id);
        $temu->delete();

        return redirect()->route('resepsionis.datamaster.temudokter.index')
                         ->with('success', 'Data Temu Dokter berhasil dihapus!');
    }

    public function delete($id)
    {
        $temu = TemuDokter::findOrFail($id);
        return view('resepsionis.datamaster.temudokter.delete', compact('temu'));
    }
}
