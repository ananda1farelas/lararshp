<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Edit Ras Hewan</h1>
        <a href="{{ route('admin.datamaster.rashewan.index') }}" class="btn-back">← Kembali</a>
    </div>

    {{-- Form Edit Ras Hewan --}}
    <form action="{{ route('admin.datamaster.rashewan.update', $ras->idras_hewan) }}" method="POST" class="add-form">
        @csrf
        @method('PUT')

        {{-- Nama Ras --}}
        <div class="form-group" style="display: grid; grid-template-columns: 1fr; gap: 10px;">
            <label for="nama_ras">Nama Ras</label>
            <input type="text" name="nama_ras" value="{{ old('nama_ras', $ras->nama_ras) }}" required class="search-box">
        </div>

        {{-- Jenis Hewan --}}
        <div class="form-group" style="display: grid; grid-template-columns: 1fr; gap: 10px; margin-top: 10px;">
            <label for="idjenis_hewan">Jenis Hewan</label>
            <select name="idjenis_hewan" required class="search-box">
                @foreach($jenis as $j)
                    <option value="{{ $j->idjenis_hewan }}" {{ $ras->idjenis_hewan == $j->idjenis_hewan ? 'selected' : '' }}>
                        {{ $j->nama_jenis_hewan }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tombol Update --}}
        <button type="submit" class="add-btn" style="margin-top: 15px;">Update</button>
    </form>
</div>
