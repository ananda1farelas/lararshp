<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    <div class="table-header">
        <h1 class="table-title">Tambah Kode Tindakan Terapi</h1>
        <a href="{{ route('admin.datamaster.kodetindakanterapi.index') }}" class="btn-back">← Kembali</a>
    </div>

    <form action="{{ route('admin.datamaster.kodetindakanterapi.store') }}" method="POST" class="add-form">
        @csrf
        <div class="form-group grid-cols-2" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
            <input type="text" name="kode" placeholder="Masukkan kode tindakan..." required class="search-box">
            <input type="text" name="deskripsi_tindakan_terapi" placeholder="Masukkan deskripsi tindakan terapi..." required class="search-box">
        </div>

        <div class="form-group grid-cols-2" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; margin-top: 10px;">
            <select name="idkategori" required class="search-box">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->idkategori }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select>

            <select name="idkategori_klinis" required class="search-box">
                <option value="">-- Pilih Kategori Klinis --</option>
                @foreach($kategoriKlinis as $kk)
                    <option value="{{ $kk->idkategori_klinis }}">{{ $kk->nama_kategori_klinis }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="add-btn" style="margin-top: 15px;">Simpan</button>
    </form>
</div>
