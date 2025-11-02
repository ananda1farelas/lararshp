<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Tambah Ras Hewan</h1>
        <a href="{{ route('admin.datamaster.rashewan.index') }}" class="btn-back">← Kembali</a>
    </div>

    {{-- Form Tambah Ras Hewan --}}
    <form action="{{ route('admin.datamaster.rashewan.store') }}" method="POST" class="add-form">
        @csrf
        <div class="form-group">
            <input type="text" name="nama_ras" placeholder="Masukkan nama ras" value="{{ old('nama_ras') }}" required class="search-box">

            <select name="idjenis_hewan" required class="search-box" style="margin-top: 10px;">
                <option value="">-- Pilih Jenis Hewan --</option>
                @foreach($jenis as $j)
                    <option value="{{ $j->idjenis_hewan }}" {{ old('idjenis_hewan') == $j->idjenis_hewan ? 'selected' : '' }}>
                        {{ $j->nama_jenis_hewan }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="add-btn" style="margin-top: 15px;">Simpan</button>
        </div>

        @error('nama_ras')
            <div class="error-message">{{ $message }}</div>
        @enderror

        @error('idjenis_hewan')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </form>
</div>
