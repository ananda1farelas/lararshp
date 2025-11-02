<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Daftar Role User</h1>
        <div class="table-actions">
            <a href="{{ route('admin.datamaster.role_user.create') }}" class="add-btn">+ Tambah Role User</a>
            <a href="{{ route('admin.datamaster.index') }}" class="btn-back">← Kembali</a>
        </div>
    </div>

    {{-- Alert Sukses --}}
    @if(session('success'))
        <div class="alert alert-success" id="flash-message">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel Role User --}}
    <table class="modern-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($roleUsers as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->user_name }}</td>
                    <td>{{ $item->role_name }}</td>
                    <td>
                        <a href="{{ route('admin.datamaster.role_user.edit', $item->idrole_user) }}" class="btn-action btn-edit">Edit</a>
                        <a href="{{ route('admin.datamaster.role_user.delete', $item->idrole_user) }}" class="btn-action btn-delete">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data role user.</td>
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
    }, 2000);
</script>
