<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<div class="table-container">

    <div class="table-header">
        <h1 class="table-title">Daftar Pemilik</h1>
        <div class="table-actions">
            <a href="{{ route('resepsionis.datamaster.pemilik.create') }}" class="add-btn">+ Tambah Pemilik</a>
            <a href="{{ route('resepsionis.datamaster.index') }}" class="btn-back">← Kembali</a>
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
                <th>Nama User</th>
                <th>No. WA</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pemilik as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->user->nama ?? '-' }}</td>
                    <td>{{ $p->no_wa }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>
                        <a href="{{ route('resepsionis.datamaster.pemilik.edit', $p->idpemilik) }}" class="btn-action btn-edit">Edit</a>
                        <a href="{{ route('resepsionis.datamaster.pemilik.delete', $p->idpemilik) }}" class="btn-action btn-delete">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data pemilik.</td>
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
