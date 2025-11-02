<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<div class="table-container">
    <div class="table-header">
        <h1 class="table-title">Edit Jenis Hewan</h1>
        <a href="{{ route('admin.datamaster.jenishewan.index') }}" class="btn-back">← Kembali</a>
    </div>

    <form action="{{ route('admin.datamaster.jenishewan.update', $jenis->idjenis_hewan) }}" method="POST" class="add-form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type="text" name="nama_jenis_hewan" value="{{ $jenis->nama_jenis_hewan }}" required class="search-box">
            <button type="submit" class="add-btn">Update</button>
        </div>
    </form>
</div>
