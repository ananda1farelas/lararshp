<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Daftar Kategori Klinis</h1>
        <div class="table-actions">
            <a href="{{ route('admin.datamaster.kategoriklinis.create') }}" class="add-btn">+ Tambah Kategori Klinis</a>
            <a href="{{ route('admin.datamaster.index') }}" class="btn-back">← Kembali</a>
        </div>
    </div>

    {{-- Alert Sukses --}}
    @if(session('success'))
        <div class="alert alert-success" id="flash-message">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel Data --}}
    <table class="modern-table">
        <thead>
            <tr>
                <th style="width: 60px;">No</th>
                <th>Nama Kategori Klinis</th>
                <th style="width: 180px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kategoriklinis as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_kategori_klinis }}</td>
                    <td>
                        <a href="{{ route('admin.datamaster.kategoriklinis.edit', $item->idkategori_klinis) }}" 
                           class="btn-action btn-edit">
                            Edit
                        </a>

                        <a href="{{ route('admin.datamaster.kategoriklinis.delete', $item->idkategori_klinis) }}" 
                           class="btn-action btn-delete">
                            Hapus
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">
                        Belum ada data kategori klinis
                    </td>
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