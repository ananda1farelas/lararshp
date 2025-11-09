<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- 🔹 Header Halaman --}}
    <div class="table-header">
        <h1 class="table-title">Rekam Medis Hewan</h1>
        <div class="table-actions">
            <a href="{{ route('pemilik.datamaster.index') }}" class="btn-back">← Kembali</a>
        </div>
    </div>
    {{-- 🔹 Tabel Rekam Medis --}}
    @if($rekamMedis->isEmpty())
        <p class="text-center text-gray-500 mt-3">Belum ada rekam medis untuk hewan Anda.</p>
    @else
        <table class="modern-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Hewan</th>
                    <th>Tanggal Pemeriksaan</th>
                    <th>Dokter Pemeriksa</th>
                    <th>Diagnosa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rekamMedis as $i => $data)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $data->temuDokter->pet->nama ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y H:i') }}</td>
                        <td>{{ $data->dokter->user->nama ?? '-' }}</td>
                        <td>{{ $data->diagnosa ?? '-' }}</td>
                        <td>
                            <a href="{{ route('pemilik.datamaster.rekammedis.show', $data->idrekam_medis) }}" class="btn-action btn-edit">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
