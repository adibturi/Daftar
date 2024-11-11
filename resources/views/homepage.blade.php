<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMA PGRI 1 PALEMBANG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/pendaftaran.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&family=Poppins:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
</head>
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>


<style>
    df-messenger {
      --df-messenger-bot-message-color: #fafafa; /* Warna latar belakang pesan bot */
      --df-messenger-button-titlebar-color: #28a745; /* Warna bar atas */
      --df-messenger-chat-background-color: #ffffff; /* Warna latar belakang chat */
      /* Mengatur ukuran default untuk desktop */
      width: 400px;
      height: 600px;
    }

    @media only screen and (max-width: 600px) {
      /* Mengatur ukuran untuk layar ponsel */
      df-messenger {
        width: 100%; /* Lebar penuh pada layar ponsel */
        height: 50%; /* Tinggi penuh */
        position: fixed;
        bottom: 0;
        right: 0;
      }
    }
  </style>
<style>

     .footer .copyright {
            text-align: center;
            padding-top: 10px;
            font-size: 15px;
        }
        .card-title {
            font-weight: bold;
            font-size: 1.25rem;
        }

        .card-text {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .btn-berita {
            background-color: #28a745;
            color: white;
        }

        .btn-berita:hover {
            background-color: #218838;
            color: white;
        }
        .news-section {
        width: 90%;
        margin: 0 auto;
        }
        .news-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .news-items {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .news-item {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 30%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .news-item img {
            width: 100%;
            height: auto;
        }

        .news-details {
            padding: 15px;
            text-align: center;
        }

        .news-details h3 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .news-details p {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }

        .read-more {
            text-decoration: none;
            color: white;
            background-color: #28a745;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .read-more:hover {
            background-color: #218838;
        }

        .news-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .pagination {
            justify-content: center;
        }

        .page-link {
            color: #28a745; /* Sesuaikan warna dengan tema */
        }

        .page-item.active .page-link {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
        }
        #load-more-button {
        background: none;
        border: none;
        color: #007bff; /* Warna teks */
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        padding: 0;
        text-decoration: none;
    }
    #load-more-button:hover {
        color: #0056b3; /* Warna teks saat hover */
    }
</style>

<body>
    <div class="pointer" id="pointer"></div>
    <button id="back-to-top" class="btn btn-primary"
        style="background-color: #28a745; position: fixed;bottom: 20px; right: 100px; display: none; z-index: 99; "><i
            class="bi bi-arrow-up"></i></button>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
          <!-- Logo di sebelah kiri -->
          <a class="navbar-brand" href="">
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
                <a class="nav-link active text-success" href="#">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#profile">Profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#ekstrakulikuler">Ekstrakulikuler</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#berita">Berita</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#daftar">Daftar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
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
    {{-- tentang prodi --}}
    <div class="container" id="profile">
        <h1 class="font-bold fs-3 py-4 text-center">Profile SMA PGRI 1 PALEMBANG</h1>
        <hr class="mx-auto" style="margin-top:-25px; height:3px; width:460px; background-color:red">
        <div class="row">
            <div class="col-6">
                <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero minus vel laborum quia
                    unde? Dolorum nisi a adipisci explicabo voluptas deleniti sunt nobis quisquam soluta dolorem eveniet
                    quia odio delectus ad, modi similique praesentium. Et voluptatum, quae molestiae, maiores ipsam,
                    dolorum repellendus minima recusandae rerum iure alias? Voluptates, porro nisi.</p>
            </div>
            <div class="col-6">
                <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid velit cupiditate
                    incidunt voluptates assumenda voluptatem nostrum molestiae necessitatibus? Iure provident aut nisi
                    commodi sed odit quam ipsam, necessitatibus iste corporis.</p>
            </div>
        </div>
    </div>
    {{-- end prodi --}}
    {{-- ekstrakulikuler --}}
    <div class="container" id="ekstrakulikuler">
        <h3 class="font-bold text-center py-3">Ekstrakurikuler</h3>
        <hr class="mx-auto" style="margin-top: -20px; width:250px; background-color:red; height:4px">
        <div class="card-group py-3">
            <div class="col-sm-3">
            <div class="card">
                <img src="https://plus.unsplash.com/premium_photo-1663011508345-16f2fcc7dade?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8bWFydGlhbCUyMGFydHxlbnwwfHwwfHx8MA%3D%3D" class="card-img-top"
                    alt="Hollywood Sign on The Hill" />
                <div class="card-body">
                    <h5 class="card-title text-center">Card title</h5>
                    <p class="card-text">
                        This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.
                    </p>
                </div>
            </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <img src="https://cdn.setneg.go.id/images/humas/2016/agustus/paskibra170816.jpg" class="card-img-top"
                        alt="Hollywood Sign on The Hill" />
                    <div class="card-body">
                        <h5 class="card-title text-center">Card title</h5>
                        <p class="card-text">
                            This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.
                        </p>
                    </div>
                </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top"
                            alt="Hollywood Sign on The Hill" />
                        <div class="card-body">
                            <h5 class="card-title text-center">Card title</h5>
                            <p class="card-text">
                                This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.
                            </p>
                        </div>
                    </div>
                    </div>
         <div class="col-sm-3">
            <div class="card">
                <img src="https://smandakebumen.wordpress.com/wp-content/uploads/2017/10/wp-image-118424559.jpg" class="card-img-top"
                    alt="Hollywood Sign on The Hill" />
                <div class="card-body">
                    <h5 class="card-title text-center">Card title</h5>
                    <p class="card-text">
                        This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.
                    </p>
                </div>
            </div>
            </div>
        </div>
    </div>
    {{-- end ekstrakulikuler --}}
    {{-- kegiatan --}}

<div class="container" id="berita">
    <h3 class="font-bold text-center py-3">Berita</h3>
    <hr class="mx-auto" style="margin-top: -20px; width:130px; background-color:red; height:4px">
    <div class="news-section">
        <div class="news-items" id="berita-container">
            @foreach($berita as $item)
                <div class="news-item">
                    <img src="{{ asset('storage/public/gambar_berita/' . $item->gambar) }}" alt="{{ $item->judul }}">
                    <div class="news-details">
                        <h3>{{ $item->judul }}</h3>
                        <p>{{ Str::limit($item->konten, 100) }}</p>
                        <a href="#" class="read-more">Baca Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
        <button id="load-more-button" class="btn btn-primary mt-3" >Load More</button>
        <input type="hidden" id="current-page" value="1">
    </div>
</div>
    {{-- end kegiatan --}}
    {{-- pendaftaran --}}
    <div class="container" id="daftar">
        <h1 class="font-bold fs-3 mb-4 text-center mt-4">Penerimaan Calon Siswa/i Baru</h1>
        <hr class="mx-auto" style="margin-top:-20px; width:490px; background-color:red; height:4px">
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit, officia maxime voluptates, dolor iste sit
            odio tempora rem id at hic architecto adipisci, cum sequi molestias? Necessitatibus cum perferendis,
            deserunt asperiores esse numquam nisi saepe est architecto quos accusantium consequuntur ea alias, velit
            similique. Inventore, dolor! Eveniet et architecto doloribus fugit temporibus distinctio a unde at fuga nemo
            assumenda, dolore quod ipsum quasi atque praesentium vero aut animi omnis consectetur maiores ad officia.
            Quo iure explicabo at cum dolorem. Officiis numquam aliquam beatae consequatur ullam quasi ea, officia hic
            recusandae a nisi cum nostrum. Facilis nisi optio assumenda laboriosam saepe?</p>
        <div class="accordion " id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Syarat-Syarat Pendaftaran
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong> It is shown by default, until the
                        collapse plugin adds the appropriate classes that we use to style each element. These classes
                        control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                        modify any of this with custom CSS or overriding our default variables. It's also worth noting
                        that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                        does limit overflow.
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary mt-3 mb-5 fw-bold" style="background-color: #28a745; color: white; border: none;">
            <a href="/daftar" style="color: white; text-decoration: none;">Daftar Sekarang</a>
        </button>
    </div>
    </div>
    {{-- end pendaftaran --}}
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="{{ asset('js/pendaftaran.js') }}"></script>
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
<script>
    // Membuat Session ID secara dinamis
    const sessionId = 'session_' + Math.random().toString(36).substring(7);

    // Menambahkan Session ID ke dalam df-messenger
    const messengerElement = document.createElement('df-messenger');
    messengerElement.setAttribute('intent', 'WELCOME');
    messengerElement.setAttribute('chat-title', 'Chatbot SMA PGRI');
    messengerElement.setAttribute('agent-id', 'a0572787-b2f8-4bf1-8bac-29f10e175d67');  // Ganti dengan Agent ID yang benar
    messengerElement.setAttribute('session-id', sessionId);  // Menambahkan Session ID dinamis
    messengerElement.setAttribute('language-code', 'id');  // Menggunakan Bahasa Indonesia

    // Tambahkan chatbot ke body HTML
    document.body.appendChild(messengerElement);
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let currentPage = 1;

    function loadMoreBerita() {
        currentPage++;
        $.ajax({
            url: "{{ route('berita.loadMore') }}",
            type: "GET",
            data: { page: currentPage },
            success: function(response) {
                $('#berita-container').append(response.berita);

                // Kondisikan tombol Load More
                if (!response.hasMoreData) {
                    $('#load-more-button').hide(); // Sembunyikan tombol jika tidak ada lagi data
                }
            },
            error: function() {
                alert("Gagal memuat data.");
            }
        });
    }

    // Inisialisasi event listener
    $(document).ready(function() {
        $('#load-more-button').on('click', loadMoreBerita);
    });
</script>
</body>
</html>
