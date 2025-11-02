<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Daftar Role</h1>
        <div class="table-actions">
            <a href="{{ route('admin.datamaster.role.create') }}" class="add-btn">+ Tambah Role</a>
            <a href="{{ route('admin.datamaster.index') }}" class="btn-back">← Kembali</a>
        </div>
    </div>

    {{-- Alert Sukses --}}
    @if(session('success'))
        <div class="alert alert-success" id="flash-message">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel Role --}}
    <table class="modern-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($roles as $index => $role)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $role->nama_role }}</td>
                    <td>
                        <a href="{{ route('admin.datamaster.role.edit', $role->idrole) }}" class="btn-action btn-edit">Edit</a>
                        <a href="{{ route('admin.datamaster.role.delete', $role->idrole) }}" class="btn-action btn-delete">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada data role.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    // Fade out flash message
    setTimeout(() => {
        const msg = document.getElementById('flash-message');
        if (msg) {
            msg.style.transition = 'opacity 0.5s ease';
            msg.style.opacity = '0';
            setTimeout(() => msg.remove(), 500);
        }
    }, 1000);
</script>
