@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Rekam Medis</h1>

    <form action="{{ route('perawat.datamaster.rekammedis.update', $rekamMedis->idrekam_medis) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="idreservasi_dokter" class="form-label">ID Reservasi Dokter</label>
            <input type="text" class="form-control" name="idreservasi_dokter" value="{{ $rekamMedis->idreservasi_dokter }}" readonly>
        </div>

        <div class="mb-3">
            <label for="anamnesa" class="form-label">Anamnesa</label>
            <textarea name="anamnesa" class="form-control" rows="3" required>{{ $rekamMedis->anamnesa }}</textarea>
        </div>

        <div class="mb-3">
            <label for="temuan_klinis" class="form-label">Temuan Klinis</label>
            <textarea name="temuan_klinis" class="form-control" rows="3" required>{{ $rekamMedis->temuan_klinis }}</textarea>
        </div>

        <div class="mb-3">
            <label for="diagnosa" class="form-label">Diagnosa</label>
            <textarea name="diagnosa" class="form-control" rows="3" required>{{ $rekamMedis->diagnosa }}</textarea>
        </div>

        <div class="mb-3">
            <label for="dokter_pemeriksa" class="form-label">Dokter Pemeriksa</label>
            <input type="text" class="form-control" name="dokter_pemeriksa" value="{{ $rekamMedis->dokter_pemeriksa }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('perawat.datamaster.rekammedis.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
