<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    <div class="table-header">
        <h1 class="table-title">Edit Kode Tindakan Terapi</h1>
        <a href="{{ route('admin.datamaster.kodetindakanterapi.index') }}" class="btn-back">← Kembali</a>
    </div>

    <form action="{{ route('admin.datamaster.kodetindakanterapi.update', $kode->idkode_tindakan_terapi) }}" 
          method="POST" class="add-form">
        @csrf
        @method('PUT')

        {{-- Input Deskripsi Tindakan Terapi --}}
        <div class="form-group" style="display: grid; grid-template-columns: 1fr; gap: 10px;">
            <label for="deskripsi_tindakan_terapi">Deskripsi Tindakan Terapi</label>
            <input type="text" name="deskripsi_tindakan_terapi" 
                   value="{{ old('deskripsi_tindakan_terapi', $kode->deskripsi_tindakan_terapi) }}" 
                   required class="search-box">
        </div>

        {{-- Dropdown kategori & kategori klinis --}}
        <div class="form-group" 
             style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; margin-top: 10px;">
            
            <div>
                <label for="idkategori">Kategori</label>
                <select name="idkategori" required class="search-box">
                    @foreach($kategori as $k)
                        <option value="{{ $k->idkategori }}" 
                            {{ $kode->idkategori == $k->idkategori ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="idkategori_klinis">Kategori Klinis</label>
                <select name="idkategori_klinis" required class="search-box">
                    @foreach($kategoriKlinis as $kk)
                        <option value="{{ $kk->idkategori_klinis }}" 
                            {{ $kode->idkategori_klinis == $kk->idkategori_klinis ? 'selected' : '' }}>
                            {{ $kk->nama_kategori_klinis }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Tombol Update --}}
        <button type="submit" class="add-btn" style="margin-top: 15px;">Update</button>
    </form>
</div>
    