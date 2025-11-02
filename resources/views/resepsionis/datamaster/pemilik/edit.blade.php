<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Edit Data Pemilik</h1>
        <a href="{{ route('resepsionis.datamaster.pemilik.index') }}" class="btn-back">← Kembali</a>
    </div>

    <form action="{{ route('resepsionis.datamaster.pemilik.update', $pemilik->idpemilik) }}" 
          method="POST" class="add-form">
        @csrf
        @method('PUT')

        {{-- Dropdown Pilih User --}}
        <div class="form-group" style="display: grid; grid-template-columns: 1fr; gap: 10px;">
            <label for="iduser">Pilih User</label>
            <select name="iduser" id="iduser" required class="search-box">
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->iduser }}" 
                        {{ $pemilik->iduser == $user->iduser ? 'selected' : '' }}>
                        {{ $user->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Input No. WhatsApp dan Alamat --}}
        <div class="form-group" 
             style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; margin-top: 10px;">

            <div>
                <label for="no_wa">No. WhatsApp</label>
                <input type="text" name="no_wa" id="no_wa"
                       placeholder="Masukkan No. WhatsApp"
                       value="{{ old('no_wa', $pemilik->no_wa) }}"
                       required class="search-box">
            </div>

            <div>
                <label for="alamat">Alamat</label>
                <input name="alamat" id="alamat" 
                          placeholder="Masukkan Alamat" 
                          value="{{ old('alamat', $pemilik->alamat) }}"
                          required class="search-box"
                 </input>
            </div>
        </div>

        {{-- Tombol Update --}}
        <button type="submit" class="add-btn" style="margin-top: 15px;">Update</button>
    </form>
</div>
