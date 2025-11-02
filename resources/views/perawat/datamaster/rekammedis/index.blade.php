<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    <div class="table-header">
        <h1 class="table-title">Data Rekam Medis</h1>
        <div class="table-actions">
            <a href="{{ route('perawat.datamaster.rekammedis.create') }}" class="add-btn">+ Tambah Rekam Medis</a>
            <a href="{{ route('perawat.datamaster.index') }}" class="btn-back">← Kembali</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success" id="flash-message">
            {{ session('success') }}
        </div>
    @endif

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
                        <a href="{{ route('perawat.datamaster.detailrekammedis.show', $rm->idrekam_medis) }}" class="btn-action btn-edit">Lihat Detail</a>
                        <a href="{{ route('perawat.datamaster.rekammedis.edit', $rm->idrekam_medis) }}" class="btn-action btn-edit">Edit</a>
                        <a href="{{ route('perawat.datamaster.rekammedis.delete', $rm->idrekam_medis) }}" class="btn-action btn-delete">Hapus</a>
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

<script>
    // Efek hilang otomatis untuk pesan sukses
    setTimeout(() => {
        const msg = document.getElementById('flash-message');
        if (msg) {
            msg.style.transition = 'opacity 0.5s ease';
            msg.style.opacity = '0';
            setTimeout(() => msg.remove(), 500);
        }
    }, 1000);
</script>
