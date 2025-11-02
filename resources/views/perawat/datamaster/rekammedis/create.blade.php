<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    <div class="table-header">
        <h1 class="table-title">Tambah Rekam Medis</h1>
        <a href="{{ route('perawat.datamaster.rekammedis.index') }}" class="btn-back">← Kembali</a>
    </div>

    <form action="{{ route('perawat.datamaster.rekammedis.store') }}" method="POST" class="add-form">
        @csrf

        <!-- Baris pertama -->
        <div class="form-group grid-cols-2" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
            <select name="idreservasi_dokter" id="idreservasi_dokter" class="search-box" required>
                @foreach($temuDokter as $r)
                    <option value="{{ $r->idreservasi_dokter }}">
                        {{ $r->pet->nama }}
                    </option>
                @endforeach
            </select>

            <select name="dokter_pemeriksa" id="dokter_pemeriksa" class="search-box" required>
                @foreach($dokter as $d)
                    <option value="{{ $d->idrole_user }}">
                        {{ $d->user->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Baris kedua -->
        <div class="form-group grid-cols-2" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; margin-top: 10px;">
            <textarea name="anamnesa" id="anamnesa" class="search-box" rows="3" placeholder="Masukkan anamnesa..." required></textarea>
            <textarea name="temuan_klinis" id="temuan_klinis" class="search-box" rows="3" placeholder="Masukkan temuan klinis..." required></textarea>
        </div>

        <!-- Baris ketiga -->
        <div class="form-group" style="margin-top: 10px;">
            <textarea name="diagnosa" id="diagnosa" class="search-box" rows="3" placeholder="Masukkan diagnosa..." required></textarea>
        </div>

        <button type="submit" class="add-btn" style="margin-top: 15px;">Simpan</button>
    </form>
</div>
