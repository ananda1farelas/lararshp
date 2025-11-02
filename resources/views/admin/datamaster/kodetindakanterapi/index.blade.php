<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Daftar Kode Tindakan Terapi</h1>
        <div class="table-actions">
            <a href="{{ route('admin.datamaster.kodetindakanterapi.create') }}" class="add-btn">+ Tambah Tindakan Terapi</a>
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
                <th>Kode</th>
                <th>Deskripsi Tindakan Terapi</th>
                <th>Kategori</th>
                <th>Kategori Klinis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kodeTindakanTerapi as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->deskripsi_tindakan_terapi }}</td>
                    <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                    <td>{{ $item->kategoriKlinis->nama_kategori_klinis ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.datamaster.kodetindakanterapi.edit', $item->idkode_tindakan_terapi) }}" 
                           class="btn-action btn-edit">Edit</a>
                        <a href="{{ route('admin.datamaster.kodetindakanterapi.delete', $item->idkode_tindakan_terapi) }}" 
                           class="btn-action btn-delete">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data tindakan terapi</td>
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
