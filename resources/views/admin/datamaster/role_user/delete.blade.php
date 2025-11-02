<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Hapus Role User</h1>
        <a href="{{ route('admin.datamaster.role_user.index') }}" class="btn-back">← Kembali</a>
    </div>

    {{-- Konfirmasi Hapus --}}
    <div class="alert alert-danger">
        Apakah Anda yakin ingin menghapus Role User ini?
    </div>

    <form action="{{ route('admin.datamaster.role_user.destroy', $roleUser->idrole_user) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn-action btn-delete">Ya, Hapus</button>
        <a href="{{ route('admin.datamaster.role_user.index') }}" class="btn-back">Batal</a>
    </form>
</div>
