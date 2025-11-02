<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Hapus Data Temu Dokter</h1>
        <a href="{{ route('resepsionis.datamaster.temudokter.index') }}" class="btn-back">← Kembali</a>
    </div>

    {{-- Pesan Konfirmasi --}}
    <div class="alert alert-danger">
        Apakah Anda yakin ingin menghapus data temu dokter dengan nomor urut 
        <strong>{{ $temu->no_urut }}</strong> 
        untuk hewan 
        <strong>{{ $temu->pet->nama ?? 'Tanpa Nama' }}</strong>?
    </div>

    {{-- Form Hapus --}}
    <form action="{{ route('resepsionis.datamaster.temudokter.destroy', $temu->idreservasi_dokter) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn-action btn-delete">Ya, Hapus</button>
        <a href="{{ route('resepsionis.datamaster.temudokter.index') }}" class="btn-back">Batal</a>
    </form>
</div>
