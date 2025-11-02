<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Edit Kategori Klinis</h1>
        <a href="{{ route('admin.datamaster.kategoriklinis.index') }}" class="btn-back">
            ← Kembali
        </a>
    </div>

    {{-- Form Edit --}}
    <form action="{{ route('admin.datamaster.kategoriklinis.update', $kategoriklinis->idkategori_klinis) }}" 
          method="POST" 
          class="add-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <input type="text" 
                   name="nama_kategori_klinis" 
                   value="{{ $kategoriklinis->nama_kategori_klinis }}" 
                   required 
                   class="search-box" 
                   placeholder="Masukkan nama kategori klinis">
            
            <button type="submit" class="add-btn">Update</button>
        </div>
    </form>
</div>
