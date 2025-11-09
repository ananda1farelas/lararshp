<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    <div class="table-header">
        <h1 class="table-title">Data Rekam Medis</h1>
        <div class="table-actions">
            <a href="{{ route('dokter.datamaster.index') }}" class="btn-back">← Kembali</a>
        </div>
    </div>

    <table class="modern-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Anamnesa</th>
                <th>Temuan Klinis</th>
                <th>Diagnosa</th>
                <th>Dokter Pemeriksa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rekamMedis as $key => $rm)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $rm->anamnesa }}</td>
                    <td>{{ $rm->temuan_klinis }}</td>
                    <td>{{ $rm->diagnosa }}</td>
                    <td>{{ $rm->dokter->user->nama ?? '-' }}</td>
                    <td>
                        <a href="{{ route('dokter.datamaster.detailrekammedis.show', $rm->idrekam_medis) }}" class="btn-action btn-edit">Lihat Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data rekam medis.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
