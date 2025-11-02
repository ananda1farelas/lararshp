<!DOCTYPE html>
<html>
<head>
    <title>RSHP UNAIR</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
</head>
<body>
    @include('layout.navbar')
    <div class="header">
        <img src="{{ asset('img/banner.webp') }}" alt="Banner RSHP" width="50%" class="header-image">
    </div>

    <div class="subnav">
        <a href="https://unair.ac.id/">UNAIR</a>
        <a href="https://fkh.unair.ac.id/">FKH UNAIR</a>
        <a href="https://mahasiswa.unair.ac.id">Cyber Campus</a>
    </div>

    <div class="content">
        <div class="info-box">
            <a href="{{ url('login') }}" class="btn-yellow">PENDAFTARAN ONLINE</a>
            <p>
                Rumah Sakit Hewan Pendidikan Universitas Airlangga berinovasi untuk selalu meningkatkan kualitas pelayanan,
                maka dari itu RSHP Universitas Airlangga mempunyai fitur pendaftaran online yang mempermudah anda untuk mendaftarkan hewan kesayangan.
            </p>
            <a href="#" class="btn-blue">INFORMASI JADWAL DOKTER JAGA</a>
        </div>

        <div class="video-box">
            <iframe width="450" height="250"
                src="https://www.youtube.com/embed/rCfvZPECZvE?autoplay=1&mute=1&loop=1&playlist=rCfvZPECZvE"
                title="Video RSHP UNAIR"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    </div>

<div class="news-section">
    <h2>BERITA TERKINI</h2>
    <div class="news-container">

        <div class="news-card">
            <img src="{{ asset('img/berita1.jpg') }}" alt="RSHP Goes to Banyuwangi">
            <h3>RSHP Goes to Banyuwangi</h3>
            <p class="date">5 August 2024</p>
            <p>
                RSHP Unair tahun 2024 ini mengadakan kegiatan kesehatan mental mengambil lokasi di Banyuwangi.
                Tanggal 2-4 Agustus RSHP Unair baik [...]
            </p>
            <a href="#">Read more...</a>
        </div>

        <div class="news-card">
            <img src="{{ asset('img/berita2.jpg') }}" alt="Fiesta Urologi">
            <h3>Seminar dan Workshop FIESTA UROLOGI</h3>
            <p class="date">21 July 2024</p>
            <p>
                RSHP Unair menjadi tempat berlangsungnya 14th FIESTA UROLOGY,
                seminar dan workshop laparoskopi pada tanggal 19 dan 20 Juli 2024. [...]
            </p>
            <a href="#">Read more...</a>
        </div>

        <div class="news-card">
            <img src="{{ asset('img/berita3.jpg') }}" alt="Benchmarking RSHP">
            <h3>Benchmarking RSHP Undana di RSHP Unair</h3>
            <p class="date">9 July 2024</p>
            <p>
                RSHP Unair tanggal 9 Juni 2024, mendapat kehormatan kunjungan rombongan
                Rumah Sakit Hewan Pendidikan Universitas Nusa Cendana [...]
            </p>
            <a href="#">Read more...</a>
        </div>
    </div>
</div>


    <div class="map-section">
        <h2>Lokasi RSHP Universitas Airlangga</h2>
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3256.891037467219!2d112.7855596740016!3d-7.270285392736676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbd40a9784f5%3A0xe756f6ae03eab99!2sAnimal%20Hospital%2C%20Universitas%20Airlangga!5e1!3m2!1sen!2sus!4v1757003458659!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-left">
            <p>&copy; 2024 Universitas Airlangga. All Rights Reserved</p>
        </div>
        <div class="footer-right">
            <h4>RUMAH SAKIT HEWAN PENDIDIKAN</h4>
            <p>
                GEDUNG RS HEWAN PENDIDIKAN<br>
                rshp@fkh.unair.ac.id<br>
                Telp : 031 5927832<br>
                Kampus C Universitas Airlangga<br>
                Surabaya 60115, Jawa Timur
            </p>
        </div>
    </footer>
</body>
</html>
