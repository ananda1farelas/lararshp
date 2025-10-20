<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Pimpinan RSHP UNAIR</title>
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">
</head>
<body>

    {{-- Navbar di atas --}}
    <div class="navbar-wrapper">
        @include('layout.navbar')
    </div>

    <div class="struktur-container">
        <div class="struktur-header">
            <img src="{{ asset('img/logo_rshp.png') }}" alt="Logo RSHP" class="logo">
            <h1>
                STRUKTUR PIMPINAN<br>
                RUMAH SAKIT HEWAN PENDIDIKAN<br>
                UNIVERSITAS AIRLANGGA
            </h1>
            <img src="{{ asset('img/logo_unair.png') }}" alt="Logo UNAIR" class="logo">
        </div>

        <div class="direktur">
            <h3>DIREKTUR</h3>
            <div class="struktur-card" style="margin: 0 auto;">
                <img src="{{ asset('img/struktur1.jpeg') }}" alt="Direktur">
                <p><strong>Dr. Ira Sari Yudaniyanti, M.P., drh.</strong></p>
            </div>
        </div>

        <div class="struktur-foto">
            <div class="struktur-card">
                <h3>WAKIL DIREKTUR 1</h3>
                <p>PELAYANAN MEDIS, PENDIDIKAN DAN PENELITIAN</p>
                <img src="{{ asset('img/struktur3.jpeg') }}" alt="Wakil Direktur 1">
                <p><strong>Dr. Nusdianto Triakoso, M.P., drh.</strong></p>
            </div>

            <div class="struktur-card">
                <h3>WAKIL DIREKTUR 2</h3>
                <p>SUMBER DAYA MANUSIA, SARANA PRASARANA DAN KEUANGAN</p>
                <img src="{{ asset('img/struktur2.jpeg') }}" alt="Wakil Direktur 2">
                <p><strong>Dr. Miyayu Soneta S., M.Vet., drh.</strong></p>
            </div>
        </div>

        <div class="struktur-footer">
            S M A R T &nbsp; S E R V I C E S
        </div>
    </div>


</body>
</html>
