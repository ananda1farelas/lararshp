<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- 🔹 Header Halaman --}}
    <div class="table-header">
        <h1 class="table-title">Temu Dokter Hewan</h1>
        <div class="table-actions">
            <a href="{{ route('pemilik.datamaster.index') }}" class="btn-back">← Kembali ke Daftar Pemilik</a>
        </div>
    </div>

    {{-- 🔹 Pesan jika tidak ada data --}}
    @if ($antrian->isEmpty())
        <p class="text-center text-muted mt-3">Belum ada data temu dokter.</p>
    @else
        <table class="modern-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Hewan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($antrian as $i => $data)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $data->pet->nama ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->waktu_daftar)->format('d M Y H:i') }}</td>
                        <td>
                            <span class="badge 
                                {{ $data->status == 'selesai' ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ ucfirst($data->status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
