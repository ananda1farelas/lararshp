<link rel="stylesheet" href="{{ asset('css/show.css') }}">
<div class="container">
    <h1>Detail Rekam Medis #{{ $rekamMedis->idrekam_medis }}</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h5>Diagnosa: {{ $rekamMedis->diagnosa }}</h5>
            <p>Anamnesa: {{ $rekamMedis->anamnesa }}</p>
            <p>Temuan Klinis: {{ $rekamMedis->temuan_klinis }}</p>
            <p>Dokter Pemeriksa: {{ $rekamMedis->dokter->user->nama ?? '-' }}</p>
        </div>
    </div>

    <h4>Detail Tindakan / Terapi</h4>
    <a href="{{ route('perawat.datamaster.detailrekammedis.create', ['idrekam_medis' => $rekamMedis->idrekam_medis]) }}" class="btn btn-primary mb-3">
        + Tambah Detail
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Tindakan</th>
                <th>Detail</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rekamMedis->detailRekamMedis as $key => $detail)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $detail->kodeTindakan->deskripsi_tindakan_terapi ?? '-' }}</td>
                    <td>{{ $detail->detail }}</td>
                    <td>
                        <a href="{{ route('perawat.datamaster.detailrekammedis.edit', $detail->iddetail_rekam_medis) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('perawat.datamaster.detailrekammedis.destroy', $detail->iddetail_rekam_medis) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus detail ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">Belum ada detail untuk rekam medis ini.</td></tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('perawat.datamaster.rekammedis.index') }}" class="btn btn-secondary">← Kembali ke Rekam Medis</a>
</div>
