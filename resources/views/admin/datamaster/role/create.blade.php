<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Tambah Role</h1>
        <a href="{{ route('admin.datamaster.role.index') }}" class="btn-back">← Kembali</a>
    </div>

    {{-- Form Tambah Role --}}
    <form action="{{ route('admin.datamaster.role.store') }}" method="POST" class="add-form">
        @csrf
        <div class="form-group">
            <input type="text" name="nama_role" placeholder="Masukkan nama role" value="{{ old('nama_role') }}" required class="search-box">
            @error('nama_role')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="add-btn" style="margin-top: 15px;">Simpan</button>
    </form>
</div>
