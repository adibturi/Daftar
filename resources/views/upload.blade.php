<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>DAFTAR</title>
    <link rel="stylesheet" href="{{ asset('css/daftar.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-2OT9iQAKJ3oYwnVn"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <style>
             .footer .copyright {
            text-align: center;
            padding-top: 10px;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <button id="back-to-top" class="btn btn-primary"
        style="background-color: #28a745; position: fixed;bottom: 20px; right: 20px; display: none; z-index: 99; "><i class="bi bi-arrow-up"></i></button>
 {{-- navbar --}}
 <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <!-- Logo di sebelah kiri -->
      <a class="navbar-brand" href="/">
        <img src="https://smaspgri1kotabekasi.sch.id/logo-sma.png" alt="" width="50" height="50">
        <span class="ms-2 text-uppercase fw-bold">SMA PGRI 1 PALEMBANG</span>
      </a>
      <!-- Tombol hamburger untuk responsif -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Menu navbar -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active text-success" href="/">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/daftar">Daftar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
{{-- carousel --}}
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://www.smeapgri-tng.sch.id/wp-content/uploads/2023/02/photo1676853633-860x433.jpeg"
                class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://www.smadwiwarna.sch.id/wp-content/uploads/2023/12/Siswa-Siswi-SMA-Dwiwarna-Sedang-Apel-Pagi.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
{{-- end carousel --}}
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <div class="container p-5">
            <h3 class="text-center mb-4">Upload Bukti Pembayaran</h3>
            <form action="{{ route('uploadpembayaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 p-3">
                        <label for="NISN" class="form-label"><b>Nomor Induk Siswa Nasional (NISN)</b></label>
                        <input type="text" class="form-control" name="nisn" pattern="\d{10}" inputmode="numeric"
                            maxlength="10"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '');"placeholder="Masukkan NISN"
                            required value="{{ old('nisn') }}">
                    </div>
                    <div class="col-md-12">
                        <label for="bukti_pembayaran" class="form-label"><b>Bukti Pembayaran</b></label>
                        <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran"
                            accept=".pdf,.doc,.docx,.jpg,.png" onchange="validateFileSize(this)" required   >
                        <div class="form-text">
                            <i>Upload 1 file yang didukung: PDF, Image. Maks 10 MB</i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-submit">Upload Sekarang</button>
                    </div>
                </div>
                </div>
            </form>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Tentang Kami</h5>
                    <p>Kami adalah perusahaan yang berfokus pada penyediaan layanan terbaik bagi pelanggan. Kami selalu berusaha untuk menghadirkan inovasi dan solusi terbaik.</p>
                </div>
                <div class="col-md-4">
                    <h5>Kontak</h5>
                    <p><i class="fa-regular fa-envelope"></i> adib@gmail.com</p>
                    <p><i class="fa-solid fa-phone"></i> +6282289640098</p>
                    <p><i class="fa-solid fa-house"></i> Jalan Sultan Muhammad Mansyur</p>
                </div>
                <div class="col-md-4">
                    <h5>Lokasi Kami</h5>
                    <!-- Div untuk peta -->
                    <div id="mapid" style="height: 300px; width: 100%;"></div>
                </div>
            </div>
        </div>
        <br>
        <div class="copyright">
            © Copyright SMA PGRI 1 PALEMBANG. Designed and Developed by Tim Pengembang
        </div>
    </footer>
    {{-- end footer --}}
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
     // Inisialisasi peta dan atur view ke lokasi SMA PGRI 1 Palembang
     var map = L.map('mapid').setView([-3.0086734, 104.7322784], 15);
        // Menambahkan layer peta menggunakan OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Menambahkan marker di lokasi SMA PGRI 1 Palembang
        L.marker([-3.0086734, 104.7322784]).addTo(map)
        .bindPopup('<b>SMA PGRI 1 Palembang</b><br>Palembang, Indonesia')
        .openPopup();

        function validateFileSize(input) {
    const file = input.files[0];
    const maxSize = 10 * 1024 * 1024; // 10 MB dalam byte
    if (file.size > maxSize) {
        alert("Ukuran file maksimal adalah 10 MB.");
        input.value = ""; // Hapus file dari input jika melebihi batas
    }
}

function isLetter(event) {
    var char = String.fromCharCode(event.which);
    // Memeriksa apakah karakter adalah huruf atau spasi
    return /^[A-Za-z\s]$/.test(char);
}
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>
