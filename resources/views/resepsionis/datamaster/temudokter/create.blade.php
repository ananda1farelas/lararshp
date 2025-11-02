<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Tambah Temu Dokter</h1>
        <a href="{{ route('resepsionis.datamaster.temudokter.index') }}" class="btn-back">← Kembali</a>
    </div>

    {{-- Form Tambah Temu Dokter --}}
    <form action="{{ route('resepsionis.datamaster.temudokter.store') }}" method="POST" class="add-form">
        @csrf
        <div class="form-group">
            
            {{-- No Urut --}}
            <p style="margin-bottom:10px; font-weight:bold;">
                Nomor urut: <span style="color:blue;">{{ $nextNumber }}</span>
            </p>
            @error('no_urut')
                <div class="error-message">{{ $message }}</div>
            @enderror

            {{-- Waktu Daftar --}}
            <input type="datetime-local" name="waktu_daftar" value="{{ old('waktu_daftar') }}" required class="search-box" style="margin-top: 10px;">
            @error('waktu_daftar')
                <div class="error-message">{{ $message }}</div>
            @enderror

            {{-- Status --}}
            <input type="hidden" name="status" value="Menunggu">
            @error('status')
                <div class="error-message">{{ $message }}</div>
            @enderror

            {{-- Pet --}}
            <select name="idpet" required class="search-box" style="display: grid; grid-template-columns: 1fr; gap: 10px; margin-top: 10px;">
                <option value="">-- Pilih Pet --</option>
                @foreach($pet as $p)
                    <option value="{{ $p->idpet }}" {{ old('idpet') == $p->idpet ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
            @error('idpet')
                <div class="error-message">{{ $message }}</div>
            @enderror

            {{-- Role User --}}
            <select name="idrole_user" required class="search-box" style="display: grid; grid-template-columns: 1fr; gap: 10px; margin-top: 10px;">
                <option value="">-- Pilih Dokter --</option>
                @foreach($dokter as $d)
                    <option value="{{ $d->idrole_user }}" {{ old('idrole_user') == $d->idrole_user ? 'selected' : '' }}>
                        {{ $d->nama }}
                    </option>
                @endforeach
            </select>
            @error('idrole_user')
                <div class="error-message">{{ $message }}</div>
            @enderror

            {{-- Tombol --}}
            <button type="submit" class="add-btn" style="margin-top: 15px;">Simpan</button>
        </div>
    </form>
</div>
