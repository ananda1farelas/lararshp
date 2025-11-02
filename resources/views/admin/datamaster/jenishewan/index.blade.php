<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<div class="table-container">
    <div class="table-header">
        <h1 class="table-title">Daftar Jenis Hewan</h1>
        <div class="table-actions"></div>
            <a href="{{ route('admin.datamaster.jenishewan.create') }}" class="add-btn">+ Tambah Jenis Hewan</a>
            <a href="{{ route('admin.datamaster.index') }}" class="btn-back">← Kembali</a>
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
                <th>Nama Jenis Hewan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jenis as $index => $value)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $value->nama_jenis_hewan }}</td>
                    <td>
                        <a href="{{ route('admin.datamaster.jenishewan.edit', $value->idjenis_hewan) }}" class="btn-action btn-edit">Edit</a>
                        <a href="{{ route('admin.datamaster.jenishewan.delete', $value->idjenis_hewan) }}" class="btn-action btn-delete">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada data jenis hewan</td>
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