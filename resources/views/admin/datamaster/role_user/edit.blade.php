<link rel="stylesheet" href="{{ asset('css/table.css') }}">

<div class="table-container">
    {{-- Header --}}
    <div class="table-header">
        <h1 class="table-title">Edit Role User</h1>
        <a href="{{ route('admin.datamaster.role_user.index') }}" class="btn-back">← Kembali</a>
    </div>

    {{-- Form Edit Role User --}}
    <form action="{{ route('admin.datamaster.role_user.update', $roleUser->idrole_user) }}" method="POST" class="add-form">
        @csrf
        @method('PUT')

        <div class="form-group" style="display: grid; grid-template-columns: 1fr; gap: 10px;">
            <label for="iduser">User</label>

            <!-- Hidden untuk kirim ID user -->
            <input type="hidden" name="iduser" value="{{ $roleUser->iduser }}">

            <!-- Input readonly untuk tampilin nama -->
            <input 
                type="text" 
                class="search-box" 
                value="{{ $users->where('iduser', $roleUser->iduser)->first()->nama ?? 'Tidak diketahui' }}" 
                readonly>
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr; gap: 10px; margin-top: 10px;">
            <label for="idrole">Role</label>
            <select name="idrole" required class="search-box">
                @foreach($roles as $role)
                    <option value="{{ $role->idrole }}" {{ $roleUser->idrole == $role->idrole ? 'selected' : '' }}>
                        {{ $role->nama_role }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="add-btn" style="margin-top: 15px;">Update</button>
    </form>
</div>
