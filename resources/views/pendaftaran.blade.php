<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>DAFTAR | SMA PGRI 1 PALEMBANG</title>
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
    <div class="pointer" id="pointer"></div>
    <button id="back-to-top" class="btn btn-primary"
        style="background-color: #28a745; position: fixed;bottom: 20px; right: 20px; display: none; z-index: 99; "><i
            class="bi bi-arrow-up"></i></button>
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
            <a class="nav-link" href="{{ route('uploadpembayaran.index') }}">Upload Bukti Pembayaran</a>
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
    <div class="container p-5">
            <h3 class="text-center mb-4">FORMULIR PENDAFTARAN</h3>
                <form action="{{ route('pendaftaran.store') }}" id="pendaftaran-form" method="POST" enctype="multipart/form-data">
                    @csrf
                <!-- Baris 1: Nama Lengkap dan Email -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="fullName" class="form-label"><b>Nama Lengkap</b></label>
                        <input type="text" onkeypress="return isLetter(event)" class="form-control" id="fullName"
                            placeholder="Masukkan nama lengkap" name="nama_lengkap" required>
                    </div>
                    <div class="col-md-6">
                        <label for="NISN" class="form-label"><b>Nomor Induk Siswa Nasional (NISN)</b></label>
                        <input type="text" class="form-control" name="nisn" pattern="\d{10}" inputmode="numeric"
                            maxlength="10"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '');"placeholder="Masukkan NISN"
                            required>
                    </div>
                </div>

                <!-- Baris 2: Tanggal Lahir dan Nomor Telepon -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tempatLahir" class="form-label"><b>Tempat Lahir</b></label>
                        <input type="text" onkeypress="return isLetter(event)" class="form-control"
                            name="tempat_lahir" inputmode="text" pattern="[A-Za-z\s]+"
                            placeholder="Masukkan Tempat Lahir" required>
                    </div>
                    <div class="col-md-6">
                        <label for="birthDate" class="form-label"><b>Tanggal Lahir</b></label>
                        <input type="date" class="form-control" id="birthDate" name="tanggal_lahir"
                            name="tanggal_lahir" required>
                    </div>
                </div>

                <!-- Baris 3: Alamat -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="address" class="form-label"><b>Alamat</b></label>
                        <input type="text" class="form-control" id="address" name="alamat" maxlength="150"
                            placeholder="Masukkan alamat lengkap" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label"><b>Nomor Telepon Aktif</b></label>
                        <input type="tel" class="form-control" id="phone" name="nomor_telepon"
                            inputmode="numeric" placeholder="Masukkan nomor telepon" maxlength="15"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                    </div>
                </div>

                <!-- Baris 4: Jenis Kelamin -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label"><b>Jenis Kelamin</b></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="male"
                                value="Laki-laki" required>
                            <label class="form-check-label" for="male">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="female"
                                value="Perempuan" required>
                            <label class="form-check-label" for="female">
                                Perempuan
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="photo" class="form-label"><b>Kartu Keluarga (KK)</b></label>
                        <input type="file" class="form-control" id="photo" name="kartu_keluarga"
                            accept=".pdf,.doc,.docx,.jpg,.png" onchange="validateFileSize(this)">
                        <div class="form-text">
                            <i>Upload 1 file yang didukung: PDF, Image. Maks 10 MB</i>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="reportCard" class="form-label"><b>Akta Kelahiran</b></label>
                        <input type="file" name="akta_kelahiran" class="form-control" id="reportCard"
                            accept=".pdf,.doc,.docx,.jpg,.png" onchange="validateFileSize(this)">
                        <div class="form-text">
                            <i>Upload 1 file yang didukung: PDF, Image. Maks 10 MB</i>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="photo" class="form-label"><b>Unggah Foto Siswa</b></label>
                        <input type="file" class="form-control" name="foto_siswa" id="photo"
                            accept=".pdf,.doc,.docx,.jpg,.png" onchange="validateFileSize(this)" >
                        <div class="form-text">
                            <i>Upload 1 file yang didukung: PDF, Image. Maks 10 MB</i>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="reportCard" class="form-label"><b>Unggah Raport Semester 1-5 (SMP)</b></label>
                        <input type="file" class="form-control" name="raport" id="reportCard"
                            accept=".pdf,.doc,.docx,.jpg,.png" onchange="validateFileSize(this)" >
                        <div class="form-text">
                            <i>Upload 1 file yang didukung: PDF, Image. Maks 10 MB</i>
                        </div>
                    </div>
                </div>

                <!-- Baris 5: Unggah Dokumen (Foto dan Raport) -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="photo" class="form-label"><b>Kartu Bantuan Sosial (KIP/KKS/PKH)</b> <b
                                style="color:red"><i><u>Jika Ada</u></i></b></label>
                        <input type="file" name="kartu_bantuan_sosial" class="form-control" id="photo"
                            accept=".pdf,.doc,.docx,.jpg,.png" onchange="validateFileSize(this)">
                        <div class="form-text">
                            <i>Upload 1 file yang didukung: PDF, Image. Maks 10 MB</i>
                        </div>
                    </div>
                </div>
                <!-- Baris 6: Tombol Submit -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-submit" id="pay-button">Daftar Sekarang</button>
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
    {{-- MIDTRANS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('pendaftaran-form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // Cegah submit form secara langsung

                    var formData = new FormData(this); // Ambil data dari form

                    // Kirim data ke server hanya untuk mendapatkan Snap Token, TIDAK menyimpan ke database
                    fetch("{{ route('pendaftaran.getSnapToken') }}", { // Ganti rute menjadi rute khusus untuk mendapatkan Snap token
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log("Full Response:", data);
                        if (data.success) {
                            var snapToken = data.data.snap_token;
                            console.log("Snap Token:", snapToken);

                            // Trigger Midtrans popup untuk memproses pembayaran
                            window.snap.pay(snapToken, {
                                onSuccess: function(result) {
                                    console.log("Payment success:", result);

                                    // Setelah pembayaran berhasil, kirim data pendaftaran ke backend untuk disimpan
                                    formData.append('payment_status', 'success'); // Tambahkan status pembayaran

                                    fetch("{{ route('pendaftaran.confirm') }}", { // Rute untuk menyimpan data setelah pembayaran berhasil
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.json())
                                    .then(confirmData => {
                                        if (confirmData.success) {
                                            alert('Pendaftaran dan pembayaran berhasil!');
                                            window.location.href = '/'; // Redirect setelah berhasil
                                        } else {
                                            alert('Gagal menyimpan data pendaftaran');
                                        }
                                    })
                                    .catch(error => {
                                        console.error("Fetch Error:", error);
                                        alert('Terjadi kesalahan saat menyimpan data');
                                    });
                                },
                                onPending: function(result) {
                                    console.log("Payment pending:", result);
                                    alert('Pembayaran sedang diproses');
                                },
                                onError: function(result) {
                                    console.log("Payment error:", result);
                                    alert('Pembayaran gagal');
                                },
                                onClose: function() {
                                    console.log("Payment popup closed");
                                    alert('Anda menutup popup pembayaran sebelum selesai');
                                }
                            });
                        } else {
                            alert('Terjadi kesalahan saat mendapatkan token pembayaran');
                        }
                    })
                    .catch(error => {
                        console.error("Fetch Error:", error);
                        alert('Terjadi kesalahan saat mengirim data');
                    });
                });
            } else {
                console.error("Form with id 'pendaftaran-form' not found");
            }
        });
    </script>

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
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/daftar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
