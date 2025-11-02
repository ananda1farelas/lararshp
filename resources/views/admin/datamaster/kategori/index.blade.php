<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Daftar Kategori</h1>
        <div class="table-actions">
            <a href="{{ route('admin.datamaster.kategori.create') }}" class="add-btn">+ Tambah Kategori</a>
            <a href="{{ route('admin.datamaster.index') }}" class="btn-back">← Kembali</a>
        </div>
    </div>

    {{-- Alert Sukses --}}
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
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kategori as $index => $k)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $k->nama_kategori }}</td>
                    <td>
                        <a href="{{ route('admin.datamaster.kategori.edit', $k->idkategori) }}" class="btn-action btn-edit">Edit</a>
                        <a href="{{ route('admin.datamaster.kategori.delete', $k->idkategori) }}" class="btn-action btn-delete">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada data kategori</td>
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