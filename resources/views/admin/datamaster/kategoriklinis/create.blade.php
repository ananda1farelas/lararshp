<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Tambah Kategori Klinis</h1>
        <a href="{{ route('admin.datamaster.kategoriklinis.index') }}" class="btn-back">
            ← Kembali
        </a>
    </div>

    {{-- Form Tambah --}}
    <form action="{{ route('admin.datamaster.kategoriklinis.store') }}" method="POST" class="add-form">
        @csrf
        <div class="form-group">
            <input type="text" 
                   name="nama_kategori_klinis" 
                   placeholder="Masukkan nama kategori klinis" 
                   required 
                   class="search-box">
            <button type="submit" class="add-btn">Simpan</button>
        </div>

        {{-- Validasi Error --}}
        @error('nama_kategori_klinis')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </form>
</div>
