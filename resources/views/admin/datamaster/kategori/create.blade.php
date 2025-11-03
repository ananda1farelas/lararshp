<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    <div class="table-header">
        <h1 class="table-title">Tambah Kategori</h1>
        <a href="{{ route('admin.datamaster.kategori.index') }}" class="btn-back">← Kembali</a>
    </div>

    <form action="{{ route('admin.datamaster.kategori.store') }}" method="POST" class="add-form">
        @csrf
        <div class="form-group">
            <input 
                type="text" 
                name="nama_kategori" 
                placeholder="Masukkan nama kategori" 
                value="{{ old('nama_kategori') }}" 
                required 
                class="search-box"
            >
            <button type="submit" class="add-btn">Simpan</button>
        </div>

        @error('nama_kategori')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </form>
</div>
