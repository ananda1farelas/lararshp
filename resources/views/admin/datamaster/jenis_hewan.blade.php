<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Jenis Hewan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jenis as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama_jenis_hewan }}</td>
        </tr>
        @endforeach
    </tbody>

