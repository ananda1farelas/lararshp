<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<div class="table-container">
    <div class="table-header">
        <h1 class="table-title">Hapus Jenis Hewan</h1>
        <a href="{{ route('admin.datamaster.jenishewan.index') }}" class="btn-back">← Kembali</a>
    </div>

    <div class="alert alert-danger">
        Apakah Anda yakin ingin menghapus <strong>{{ $jenis->nama_jenis_hewan }}</strong>?
    </div>

    <form action="{{ route('admin.datamaster.jenishewan.destroy', $jenis->idjenis_hewan) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-action btn-delete">Ya, Hapus</button>
        <a href="{{ route('admin.datamaster.jenishewan.index') }}" class="btn-back">Batal</a>
    </form>
</div>
