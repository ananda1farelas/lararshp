<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">

    <div class="table-header">
        <h1 class="table-title">Hapus Data Pemilik</h1>
        <a href="{{ route('perawat.datamaster.rekammedis.index') }}" class="btn-back">← Kembali</a>
    </div>

    <div class="alert alert-danger">
        Apakah Anda yakin ingin menghapus data <strong>Rekam Medis ini</strong>
    </div>

    <form action="{{ route('perawat.datamaster.rekammedis.destroy', $detailRekamMedis->iddetail_rekam_medis) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn-action btn-delete">Ya, Hapus</button>
        <a href="{{ route('perawat.datamaster.rekammedis.index') }}" class="btn-back">Batal</a>
    </form>
</div>
