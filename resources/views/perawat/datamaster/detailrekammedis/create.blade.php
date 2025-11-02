<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    <div class="table-header">
        <h1 class="table-title">Tambah Detail Rekam Medis</h1>
        <a href="{{ url()->previous() }}" class="btn-back">← Kembali</a>
    </div>

    <form action="{{ route('perawat.datamaster.detailrekammedis.store') }}" method="POST" class="add-form">
        @csrf

        <!-- Baris pertama: Rekam Medis -->
        <div class="form-group grid-cols-2" 
            style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">

            <input type="text" 
                   value="No{{ $rekamMedis->idrekam_medis }} - {{ $rekamMedis->diagnosa }}" 
                   readonly class="search-box">
            <input type="hidden" name="idrekam_medis" value="{{ $rekamMedis->idrekam_medis }}">

            <select name="idkode_tindakan_terapi" id="idkode_tindakan_terapi" class="search-box" required>
                <option value="">-- Pilih Kode Tindakan --</option>
                    @foreach($tindakan as $t)
                        <option value="{{ $t->idkode_tindakan_terapi }}">{{ $t->deskripsi_tindakan_terapi }}</option>
                    @endforeach
            </select>
        </div>

        <!-- Baris kedua: Detail -->
        <div class="form-group" style="margin-top: 10px;">
            <textarea name="detail" id="detail" class="search-box" rows="3" placeholder="Masukkan detail tindakan / terapi..." required></textarea>
        </div>

        <button type="submit" class="add-btn" style="margin-top: 15px;">Simpan</button>
    </form>
</div>
