<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Hapus Ras Hewan</h1>
        <a href="{{ route('admin.datamaster.rashewan.index') }}" class="btn-back">← Kembali</a>
    </div>

    {{-- Pesan Konfirmasi --}}
    <div class="alert alert-danger">
        Apakah Anda yakin ingin menghapus ras hewan 
        <strong>{{ $ras->nama_ras }}</strong>?
    </div>

    {{-- Form Hapus --}}
    <form action="{{ route('admin.datamaster.rashewan.destroy', $ras->idras_hewan) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn-action btn-delete">Ya, Hapus</button>
        <a href="{{ route('admin.datamaster.rashewan.index') }}" class="btn-back">Batal</a>
    </form>
</div>
