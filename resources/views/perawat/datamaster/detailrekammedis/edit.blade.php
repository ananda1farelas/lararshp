<div class="container">
    <h1>Edit Detail Rekam Medis</h1>

    <form action="{{ route('perawat.datamaster.detailrekammedis.update', $detailRekamMedis->iddetail_rekam_medis) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="idrekam_medis" class="form-label">Rekam Medis</label>
            <select name="idrekam_medis" id="idrekam_medis" class="form-select" required>
                @foreach($rekamMedis as $rm)
                    <option value="{{ $rm->idrekam_medis }}" {{ $detailRekamMedis->idrekam_medis == $rm->idrekam_medis ? 'selected' : '' }}>
                        #{{ $rm->idrekam_medis }} - {{ $rm->diagnosa }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="idkode_tindakan_terapi" class="form-label">Kode Tindakan Terapi</label>
            <select name="idkode_tindakan_terapi" id="idkodetindakanterapi" class="form-select" required>
                @foreach($kodeTindakan as $t)
                    <option value="{{ $t->idkode_tindakan_terapi }}" {{ $detailRekamMedis->idkode_tindakan_terapi == $t->idkode_tindakan_terapi ? 'selected' : '' }}>
                        {{ $t->nama_tindakan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="detail" class="form-label">Detail</label>
            <textarea name="detail" id="detail" class="form-control" rows="3" required>{{ $detailRekamMedis->detail }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('perawat.datamaster.detailrekammedis.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
