<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Tambah Hewan</h1>
        <a href="{{ route('resepsionis.datamaster.pet.index') }}" class="btn-back">← Kembali</a>
    </div>

    {{-- Form Tambah Hewan --}}
    <form action="{{ route('resepsionis.datamaster.pet.store') }}" method="POST" class="add-form">
        @csrf
        <div class="form-group">
            <input type="text" name="nama" placeholder="Nama Hewan" value="{{ old('nama') }}" required class="search-box">
            @error('nama')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required class="search-box" style="margin-top: 10px;">
            @error('tanggal_lahir')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <input type="text" name="warna_tanda" placeholder="Warna/Tanda" value="{{ old('warna_tanda') }}" required class="search-box" style="margin-top: 10px;">
            @error('warna_tanda')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <select name="jenis_kelamin" required class="search-box" style="display: grid; grid-template-columns: 1fr; gap: 10px; margin-top: 10px;">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="J" {{ old('jenis_kelamin') == 'J' ? 'selected' : '' }}>Jantan</option>
                <option value="B" {{ old('jenis_kelamin') == 'B' ? 'selected' : '' }}>Betina</option>
            </select>
            @error('jenis_kelamin')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <select name="idpemilik" required class="search-box" style="display: grid; grid-template-columns: 1fr; gap: 10px; margin-top: 10px;">
                <option value="">-- Pilih Pemilik --</option>
                @foreach($pemilik as $p)
                    <option value="{{ $p->idpemilik }}" {{ old('idpemilik') == $p->idpemilik ? 'selected' : '' }}>
                        {{ $p->user->nama ?? 'Tanpa Nama' }}
                    </option>
                @endforeach
            </select>
            @error('idpemilik')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <select name="idras_hewan" required class="search-box" style="display: grid; grid-template-columns: 1fr; gap: 10px; margin-top: 10px;">
                <option value="">-- Pilih Ras Hewan --</option>
                @foreach($rasHewan as $r)
                    <option value="{{ $r->idras_hewan }}" {{ old('idras_hewan') == $r->idras_hewan ? 'selected' : '' }}>
                        {{ $r->nama_ras }}
                    </option>
                @endforeach
            </select>
            @error('idras_hewan')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <button type="submit" class="add-btn" style="margin-top: 15px;">Simpan</button>
        </div>
    </form>
</div>
