<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Hapus Role</h1>
        <a href="{{ route('admin.datamaster.role.index') }}" class="btn-back">← Kembali</a>
    </div>

    {{-- Alert Konfirmasi --}}
    <div class="alert alert-danger">
        Apakah Anda yakin ingin menghapus role 
        <strong>{{ $role->nama_role }}</strong>?
    </div>

    {{-- Form Hapus --}}
    <form action="{{ route('admin.datamaster.role.destroy', $role->idrole) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn-action btn-delete">Ya, Hapus</button>
        <a href="{{ route('admin.datamaster.role.index') }}" class="btn-back">Batal</a>
    </form>
</div>
