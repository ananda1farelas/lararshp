<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">

    <div class="table-header">
        <h1 class="table-title">Hapus Data Pemilik</h1>
        <a href="{{ route('resepsionis.datamaster.pemilik.index') }}" class="btn-back">← Kembali</a>
    </div>

    <div class="alert alert-danger">
        Apakah Anda yakin ingin menghapus data pemilik 
        <strong>{{ $pemilik->user->nama ?? '-' }}</strong>?
    </div>

    <form action="{{ route('resepsionis.datamaster.pemilik.destroy', $pemilik->idpemilik) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn-action btn-delete">Ya, Hapus</button>
        <a href="{{ route('resepsionis.datamaster.pemilik.index') }}" class="btn-back">Batal</a>
    </form>
</div>
