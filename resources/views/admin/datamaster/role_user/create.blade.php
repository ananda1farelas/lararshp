<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Tambah Role User</h1>
        <a href="{{ route('admin.datamaster.role_user.index') }}" class="btn-back">← Kembali</a>
    </div>

    {{-- Form Tambah Role User --}}
    <form action="{{ route('admin.datamaster.role_user.store') }}" method="POST" class="add-form">
        @csrf

        <div class="form-group" style="display: grid; grid-template-columns: 1fr; gap: 10px;">
            <label for="iduser">User</label>
            <select name="iduser" required class="search-box">
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->iduser }}">{{ $user->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr; gap: 10px; margin-top: 10px;">
            <label for="idrole">Role</label>
            <select name="idrole" required class="search-box">
                <option value="">-- Pilih Role --</option>
                @foreach($roles as $role)
                    <option value="{{ $role->idrole }}">{{ $role->nama_role }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="add-btn" style="margin-top: 15px;">Simpan</button>
    </form>
</div>
