<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Daftar Ras Hewan</h1>
        <div class="table-actions">
            <a href="{{ route('admin.datamaster.rashewan.create') }}" class="add-btn">+ Tambah Ras</a>
            <a href="{{ route('admin.datamaster.index') }}" class="btn-back">← Kembali</a>
        </div>
    </div>

    {{-- Pesan Sukses --}}
    @if(session('success'))
        <div class="alert alert-success" id="flash-message">{{ session('success') }}</div>
    @endif

    {{-- Table --}}
    <table class="modern-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ras</th>
                <th>Jenis Hewan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ras as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_ras }}</td>
                    <td>{{ $item->jenisHewan->nama_jenis_hewan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.datamaster.rashewan.edit', $item->idras_hewan) }}" class="btn-action btn-edit">Edit</a>
                        <a href="{{ route('admin.datamaster.rashewan.delete', $item->idras_hewan) }}" class="btn-action btn-delete">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data ras hewan.</td>
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
