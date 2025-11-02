<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Edit Role</h1>
        <a href="{{ route('admin.datamaster.role.index') }}" class="btn-back">← Kembali</a>
    </div>

    {{-- Form Edit Role --}}
    <form action="{{ route('admin.datamaster.role.update', $role->idrole) }}" method="POST" class="add-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <input type="text" name="nama_role" value="{{ old('nama_role', $role->nama_role) }}" placeholder="Nama Role" required class="search-box">
            @error('nama_role')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="add-btn" style="margin-top: 15px;">Update</button>
    </form>
</div>
