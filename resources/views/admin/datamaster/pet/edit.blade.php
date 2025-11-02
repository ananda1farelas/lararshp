<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Edit Hewan</h1>
        <a href="{{ route('admin.datamaster.pet.index') }}" class="btn-back">← Kembali</a>
    </div>

    {{-- Form Edit Hewan --}}
    <form action="{{ route('admin.datamaster.pet.update', $pet->idpet) }}" 
          method="POST" class="add-form">
        @csrf
        @method('PUT')

        {{-- Nama Hewan --}}
        <div class="form-group" style="display: grid; grid-template-columns: 1fr; gap: 10px;">
            <label for="nama">Nama Hewan</label>
            <input type="text" name="nama" 
                   value="{{ old('nama', $pet->nama) }}" 
                   required class="search-box">
        </div>

        {{-- Tanggal Lahir & Warna Tanda --}}
        <div class="form-group" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; margin-top: 10px;">
            <div>
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" 
                       value="{{ old('tanggal_lahir', $pet->tanggal_lahir) }}" 
                       required class="search-box">
            </div>
            <div>
                <label for="warna_tanda">Warna / Tanda</label>
                <input type="text" name="warna_tanda" 
                       value="{{ old('warna_tanda', $pet->warna_tanda) }}" 
                       required class="search-box">
            </div>
        </div>

        {{-- Jenis Kelamin & Pemilik --}}
        <div class="form-group" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; margin-top: 10px;">
            <div>
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" required class="search-box">
                    <option value="L" {{ $pet->jenis_kelamin == 'L' ? 'selected' : '' }}>Jantan</option>
                    <option value="P" {{ $pet->jenis_kelamin == 'P' ? 'selected' : '' }}>Betina</option>
                </select>
            </div>
            <div>
                <label for="idpemilik">Pemilik</label>
                <select name="idpemilik" required class="search-box">
                    @foreach($pemilik as $p)
                        <option value="{{ $p->idpemilik }}" 
                            {{ $pet->idpemilik == $p->idpemilik ? 'selected' : '' }}>
                            {{ $p->user->nama ?? 'Tanpa Nama' }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Ras Hewan --}}
        <div class="form-group" style="display: grid; grid-template-columns: 1fr; gap: 10px; margin-top: 10px;">
            <label for="idras_hewan">Ras Hewan</label>
            <select name="idras_hewan" required class="search-box">
                @foreach($rasHewan as $r)
                    <option value="{{ $r->idras_hewan }}" 
                        {{ $pet->idras_hewan == $r->idras_hewan ? 'selected' : '' }}>
                        {{ $r->nama_ras }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tombol Update --}}
        <button type="submit" class="add-btn" style="margin-top: 15px;">Update</button>
    </form>
</div>
