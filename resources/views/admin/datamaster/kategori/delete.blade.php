<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Hapus Kategori</h1>
        <a href="{{ route('admin.datamaster.kategori.index') }}" class="btn-back">
            ← Kembali
        </a>
    </div>

    {{-- Alert Konfirmasi --}}
    <div class="alert alert-danger">
        Apakah Anda yakin ingin menghapus kategori 
        <strong>{{ $kategori->nama_kategori }}</strong>?
    </div>

    {{-- Form Konfirmasi Hapus --}}
    <form action="{{ route('admin.datamaster.kategori.destroy', $kategori->idkategori) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn-action btn-delete">
            <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                      clip-rule="evenodd"/>
            </svg>
            Ya, Hapus
        </button>

        <a href="{{ route('admin.datamaster.kategori.index') }}" class="btn-back">
            Batal
        </a>
    </form>
</div>
