<link rel="stylesheet" href="{{ asset('css/show.css') }}">

<div class="container">
    {{-- 🔹 Judul Halaman --}}
    <h1>Daftar Hewan Peliharaan {{ $pemilik->user->nama ?? '-' }}</h1>

    {{-- 🔹 Card Info Pemilik --}}
    <div class="card mb-3">
        <div class="card-body">
            <h5>Nama Pemilik: {{ $pemilik->user->nama ?? '-' }}</h5>
            <p>Alamat: {{ $pemilik->alamat ?? '-' }}</p>
            <p>No. Telepon: {{ $pemilik->no_wa ?? '-' }}</p>
        </div>
    </div>

    {{-- 🔹 Header Aksi --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Detail Hewan Peliharaan</h4>
        <div>
            <a href="{{ route('pemilik.datamaster.index') }}" class="btn btn-secondary">
                ← Kembali ke Daftar Pemilik
            </a>
        </div>
    </div>

    {{-- 🔹 Tabel Hewan --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Hewan</th>
                <th>Jenis Kelamin</th>
                <th>Ras</th>
                <th>Tanggal Lahir</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pet as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->jenis_kelamin == 'L' ? 'Jantan' : 'Betina' }}</td>
                    <td>{{ $p->ras->nama_ras ?? '-' }}</td>
                    <td>{{ $p->tanggal_lahir }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data hewan peliharaan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
