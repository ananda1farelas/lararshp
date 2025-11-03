<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::with(['pemilik.user', 'ras'])->get();
        return view('admin.datamaster.pet.index', compact('pets'));
    }


    public function create()
    {
        $pemilik = Pemilik::with('user')->get();
        $rasHewan = RasHewan::all();
        return view('admin.datamaster.pet.create', compact('pemilik', 'rasHewan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'warna_tanda' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'idpemilik' => 'required|integer',
            'idras_hewan' => 'required|integer',
        ]);

        Pet::create($request->all());

        return redirect()->route('admin.datamaster.pet.index')
                         ->with('success', 'Data hewan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        $pemilik = Pemilik::with('user')->get();
        $rasHewan = RasHewan::all();
        return view('admin.datamaster.pet.edit', compact('pet', 'pemilik', 'rasHewan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'warna_tanda' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'idpemilik' => 'required|integer',
            'idras_hewan' => 'required|integer',
        ]);

        $pet = Pet::findOrFail($id);
        $pet->update($request->all());

        return redirect()->route('admin.datamaster.pet.index')
                         ->with('success', 'Data hewan berhasil diperbarui');
    }

    public function destroy($id)
    {
        Pet::destroy($id);
        return redirect()->route('admin.datamaster.pet.index')
                         ->with('success', 'Data hewan berhasil dihapus');
    }

        public function delete($id)
    {
        $pet = Pet::with(['pemilik.user'])->findOrFail($id);
        return view('admin.datamaster.pet.delete', compact('pet'));
    }

    private function formatNamaPet($nama)
    {
        return ucwords(strtolower($nama));
    }

    private function validateNamaPet(Request $request)
    {
        return $request->validate([
            'nama' => 'required|string|max:100',
        ]);
    }

    private function createPet(array $data)
    {
        return Pet::create($data);
    }
}
