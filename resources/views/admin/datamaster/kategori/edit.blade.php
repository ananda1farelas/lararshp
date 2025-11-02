<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    <div class="table-header">
        <h1 class="table-title">Edit Kategori</h1>
        <a href="{{ route('admin.datamaster.kategori.index') }}" class="btn-back">← Kembali</a>
    </div>

    <form action="{{ route('admin.datamaster.kategori.update', $kategori->idkategori) }}" 
          method="POST" 
          class="add-form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type="text" 
                   name="nama_kategori" 
                   value="{{ $kategori->nama_kategori }}" 
                   required 
                   class="search-box"
                   placeholder="Masukkan nama kategori">
            <button type="submit" class="add-btn">Update</button>
        </div>
    </form>
</div>
