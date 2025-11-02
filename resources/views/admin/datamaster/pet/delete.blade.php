<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    <div class="table-header">
        <h1 class="table-title">Hapus Data Hewan</h1>
        <a href="{{ route('admin.datamaster.pet.index') }}" class="btn-back">← Kembali</a>
    </div>

    <div class="alert alert-danger">
        Apakah Anda yakin ingin menghapus hewan 
        <strong>{{ $pet->nama }}</strong> milik 
        <strong>{{ $pet->pemilik->user->nama ?? 'Tanpa Nama' }}</strong>?
    </div>

    <form action="{{ route('admin.datamaster.pet.destroy', $pet->idpet) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn-action btn-delete">Ya, Hapus</button>
        <a href="{{ route('admin.datamaster.pet.index') }}" class="btn-back">Batal</a>
    </form>
</div>
