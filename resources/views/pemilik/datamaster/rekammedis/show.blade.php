<link rel="stylesheet" href="{{ asset('css/show.css') }}">

<div class="container">
    {{-- 🔹 Judul Halaman --}}
    <h1>Detail Rekam Medis #{{ $rekamMedis->idrekam_medis }}</h1>

    {{-- 🔹 Informasi Umum Rekam Medis --}}
    <div class="card mb-3">
        <div class="card-body">
            <h5>Nama Hewan: {{ $rekamMedis->temuDokter->pet->nama ?? '-' }}</h5>
            <p>Tanggal Pemeriksaan: {{ \Carbon\Carbon::parse($rekamMedis->created_at)->format('d M Y H:i') }}</p>
            <p>Dokter Pemeriksa: {{ $rekamMedis->dokter->user->nama ?? '-' }}</p>
            <hr>
            <p><strong>Anamnesa:</strong> {{ $rekamMedis->anamnesa ?? '-' }}</p>
            <p><strong>Temuan Klinis:</strong> {{ $rekamMedis->temuan_klinis ?? '-' }}</p>
            <p><strong>Diagnosa:</strong> {{ $rekamMedis->diagnosa ?? '-' }}</p>
        </div>
    </div>

    {{-- 🔹 Detail Tindakan / Terapi --}}
    <h4>Detail Tindakan / Terapi</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Deskripsi Tindakan</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rekamMedis->detailRekamMedis as $key => $detail)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $detail->kodeTindakan->deskripsi_tindakan_terapi ?? '-' }}</td>
                    <td>{{ $detail->detail ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada tindakan atau terapi yang tercatat.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- 🔹 Tombol Kembali --}}
    <a href="{{ route('pemilik.datamaster.rekammedis.index') }}" class="btn btn-secondary">
        ← Kembali ke Daftar Rekam Medis
    </a>
</div>
