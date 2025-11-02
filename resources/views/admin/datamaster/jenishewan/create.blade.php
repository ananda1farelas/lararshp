<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<div class="table-container">
    <div class="table-header">
        <h1 class="table-title">Tambah Jenis Hewan</h1>
        <a href="{{ route('admin.datamaster.jenishewan.index') }}" class="btn-back">← Kembali</a>
    </div>

    <form action="{{ route('admin.datamaster.jenishewan.store') }}" method="POST" class="add-form">
        @csrf
        <div class="form-group">
            <input type="text" name="nama_jenis_hewan" placeholder="Masukkan nama jenis hewan" required class="search-box">
            <button type="submit" class="add-btn">Simpan</button>
        </div>
        @error('nama_jenis_hewan')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </form>
</div>
