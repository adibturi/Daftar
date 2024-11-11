<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout/style')
    @yield('styles')
    <title>@yield('titles')</title>
    <title>@yield('title')</title>

    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div id="loading" style="display:none"></div>

    <div class="wrapper">
        {{-- ini header --}}
        @includeIf('layout/header')
        {{-- ini sidebar --}}
        @includeIf('layout/sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">BUAT BERITA</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container my-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Formulir Unggah Berita</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Berita</label>
                                <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul berita" required>
                            </div>
                            <div class="mb-3">
                                <label for="konten" class="form-label">Konten Berita</label>
                                <textarea name="konten" id="konten" rows="4" class="form-control" placeholder="Masukkan konten berita" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Unggah Gambar (Opsional)</label>
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success w-100">Unggah Berita</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @includeIf('layout/script')
        @stack('scripts')

        <!-- Tambahkan Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>

</html>
