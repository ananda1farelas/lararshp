<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Tambah Pemilik</h1>
        <a href="{{ route('resepsionis.datamaster.pemilik.index') }}" class="btn-back">← Kembali</a>
    </div>

    <form action="{{ route('resepsionis.datamaster.pemilik.store') }}" method="POST" class="add-form">
        @csrf

        {{-- Baris pertama: Pilih User dan Nomor WA --}}
        <div class="form-group grid-cols-2" 
             style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
            
            <select name="iduser" id="iduser" required class="search-box">
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->iduser }}">{{ $user->nama }}</option>
                @endforeach
            </select>

            <input type="text" name="no_wa" 
                   placeholder="Masukkan nomor WhatsApp..." 
                   required class="search-box">
        </div>

        {{-- Baris kedua: Alamat --}}
        <div class="form-group" 
             style="display: grid; grid-template-columns: 1fr; gap: 10px; margin-top: 10px;">
            <textarea name="alamat" placeholder="Masukkan alamat lengkap..." 
                      required class="search-box" rows="3"></textarea>
        </div>

        {{-- Tombol Simpan --}}
        <button type="submit" class="add-btn" style="margin-top: 15px;">Simpan</button>

        {{-- Pesan error --}}
        @error('iduser')
            <div class="error-message">{{ $message }}</div>
        @enderror
        @error('no_wa')
            <div class="error-message">{{ $message }}</div>
        @enderror
        @error('alamat')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </form>
</div>
