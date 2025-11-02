<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    <div class="table-header">
        <h1 class="table-title">Hapus Kode Tindakan Terapi</h1>
        <a href="{{ route('admin.datamaster.kodetindakanterapi.index') }}" class="btn-back">← Kembali</a>
    </div>

    <div class="alert alert-danger">
        Apakah Anda yakin ingin menghapus tindakan terapi dengan kode 
        <strong>{{ $kode->kode }}</strong> ({{ $kode->deskripsi_tindakan_terapi }})?
    </div>

    <form action="{{ route('admin.datamaster.kodetindakanterapi.destroy', $kode->idkode_tindakan_terapi) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn-action btn-delete">Ya, Hapus</button>
        <a href="{{ route('admin.datamaster.kodetindakanterapi.index') }}" class="btn-back">Batal</a>
    </form>
</div>
