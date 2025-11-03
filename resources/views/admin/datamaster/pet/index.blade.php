<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Daftar Hewan</h1>
        <div class="table-actions">
            <a href="{{ route('admin.datamaster.pet.create') }}" class="add-btn">+ Tambah Hewan</a>
            <a href="{{ route('admin.datamaster.index') }}" class="btn-back">← Kembali</a>
        </div>
    </div>
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
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Warna / Tanda</th>
                <th>Jenis Kelamin</th>
                <th>Pemilik</th>
                <th>Ras Hewan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pets as $index => $pet)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pet->nama }}</td>
                    <td>{{ $pet->tanggal_lahir }}</td>
                    <td>{{ $pet->warna_tanda }}</td>
                    <td>{{ $pet->jenis_kelamin == 'L' ? 'Jantan' : 'Betina' }}</td>
                    <td>{{ $pet->pemilik->user->nama ?? 'Tanpa Nama' }}</td>
                    <td>{{ $pet->ras->nama_ras ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.datamaster.pet.edit', $pet->idpet) }}" class="btn-action btn-edit">Edit</a>
                        <a href="{{ route('admin.datamaster.pet.delete', $pet->idpet) }}" class="btn-action btn-delete">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data hewan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    setTimeout(() => {
        const msg = document.getElementById('flash-message');
        if (msg) {
            msg.style.transition = 'opacity 0.5s ease';
            msg.style.opacity = '0';
            setTimeout(() => msg.remove(), 500);
        }
    }, 1000);
</script>
