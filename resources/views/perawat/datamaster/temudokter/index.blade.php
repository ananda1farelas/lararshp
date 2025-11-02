<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Daftar Temu Dokter</h1>
        <div class="table-actions">
            <a href="{{ route('resepsionis.datamaster.temudokter.create') }}" class="add-btn">+ Tambah Temu Dokter</a>
            <a href="{{ route('resepsionis.datamaster.index') }}" class="btn-back">← Kembali</a>
        </div>
    </div>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success" id="flash-message">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel --}}
    <table class="modern-table">
        <thead>
            <tr>
                <th>No</th>
                <th>No Urut</th>
                <th>Waktu Daftar</th>
                <th>Status</th>
                <th>Nama Hewan</th>
                <th>Dokter Pemeriksa</th>
            </tr>
        </thead>
        <tbody>
            @forelse($temuDokter as $index => $t)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $t->no_urut }}</td>
                    <td>{{ $t->waktu_daftar }}</td>
                    <td>
                        <span class="{{ $t->status == 'Selesai' ? 'status-done' : 'status-wait' }}">
                            {{ $t->status }}
                        </span>
                    </td>
                    <td>{{ $t->pet->nama ?? '-' }}</td>
                    <td>{{ $t->roleUser->user->nama ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data temu dokter</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

