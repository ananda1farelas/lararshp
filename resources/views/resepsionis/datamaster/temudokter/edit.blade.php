<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Edit Data Temu Dokter</h1>
        <a href="{{ route('resepsionis.datamaster.temudokter.index') }}" class="btn-back">← Kembali</a>
    </div>

    {{-- Form Edit Temu Dokter --}}
    <form action="{{ route('resepsionis.datamaster.temudokter.update', $temu->idreservasi_dokter) }}" 
          method="POST" class="add-form">
        @csrf
        @method('PUT')

        {{-- No Urut --}}
        <div class="form-group" style="display: grid; grid-template-columns: 1fr; gap: 10px;">
            <label for="no_urut">No Urut</label>
            <input type="text" name="no_urut" 
                   value="{{ old('no_urut', $temu->no_urut) }}" 
                   required class="search-box">
            @error('no_urut')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        {{-- Waktu Daftar & Status --}}
        <div class="form-group" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; margin-top: 10px;">
            <div>
                <label for="waktu_daftar">Waktu Daftar</label>
                <input type="datetime-local" name="waktu_daftar" 
                       value="{{ old('waktu_daftar', $temu->waktu_daftar) }}" 
                       required class="search-box">
                @error('waktu_daftar')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="status">Status</label>
                <select name="status" required class="search-box">
                    <option value="Menunggu" {{ $temu->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Selesai" {{ $temu->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                @error('status')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Pet & Role User --}}
        <div class="form-group" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; margin-top: 10px;">
            <div>
                <label for="idpet">Pet</label>
                <select name="idpet" required class="search-box">
                    @foreach($pet as $p)
                        <option value="{{ $p->idpet }}" {{ $temu->idpet == $p->idpet ? 'selected' : '' }}>
                            {{ $p->nama }}
                        </option>
                    @endforeach
                </select>
                @error('idpet')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div>
            <label for="idrole_user">Role User</label>
            <select name="idrole_user" required class="search-box" style="margin-top: 10px;">
                @foreach($dokter as $d)
                    <option value="{{ $d->idrole_user }}" {{ old('idrole_user') == $d->idrole_user ? 'selected' : '' }}>
                        {{ $d->nama }}
                    </option>
                @endforeach
            </select>
                @error('idrole_user')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Tombol Update --}}
        <button type="submit" class="add-btn" style="margin-top: 15px;">Update</button>
    </form>
</div>
