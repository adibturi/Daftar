<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout/style')
    @yield('styles')
    <title>@yield('titles')</title>
    <title>@yield('title')</title>
</head>
<!-- SweetAlert2 CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.16/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<body class="hold-transition skin-blue sidebar-mini">
    <div id="loading" style="display:none"></div>
        {{-- ini header --}}
        @includeIf('layout/header')
        {{-- ini sidebar --}}
        @includeIf('layout/sidebar')
        <div class="content-wrapper">

            <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">SISWA BARU</h1>
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <div class="card p-3">
                    <div class="card-header">
                    <h3 class="card-title"><b>LIST SISWA BARU</b></h3>
                    <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">

                    </div>
                    </div>
                    </div>

                    <div class="card-body table-responsive p-10">
                    <table class="table table-hover text-nowrap"  id="example">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Foto Siswa</th>
                        <th>Nama Lengkap</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>NISN</th>
                        <th>Nomor Telepon</th>
                        <th>Kartu Keluarga</th>
                        <th>Akta Kelahiran</th>
                        <th>Rapot</th>
                        <th>Kartu Bantuan Sosial</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftarans as $pendaftaran)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($pendaftaran->foto_siswa)
                                    <img src="{{ asset('storage/public/foto_siswa/' . $pendaftaran->foto_siswa) }}" alt="Foto Siswa" width="100">
                                @else
                                    Tidak ada file
                                @endif
                            </td>
                            <td>{{ $pendaftaran->nama_lengkap }}</td>
                            <td>{{ $pendaftaran->tempat_lahir }}</td>
                            <td>{{ $pendaftaran->tanggal_lahir }}</td>
                            <td>{{ $pendaftaran->alamat }}</td>
                            <td>{{ $pendaftaran->jenis_kelamin }}</td>
                            <td>{{ $pendaftaran->nisn }}</td>
                            <td>{{ $pendaftaran->nomor_telepon }}</td>
                            <td>
                                @if ($pendaftaran->kartu_keluarga)
                                    <img src="{{ asset('storage/' . $pendaftaran->kartu_keluarga) }}" alt="Kartu Keluarga" style="max-width: 100px; max-height: 100px;">
                                @else
                                    Tidak ada file
                                @endif
                            </td>
                            <td>
                                @if ($pendaftaran->akta_kelahiran)
                                    <a href="{{ asset('storage/' . $pendaftaran->akta_kelahiran) }}" target="_blank">Lihat Akta Kelahiran</a>
                                @else
                                    Tidak ada file
                                @endif
                            </td>
                            <td>
                                @if ($pendaftaran->raport)
                                    <img src="{{ asset('storage/' . $pendaftaran->raport) }}" alt="Foto Siswa" width="100">
                                @else
                                    Tidak ada file
                                @endif
                            </td>
                            <td>
                                @if ($pendaftaran->kartu_bantuan_sosial)
                                    <img src="{{ asset('storage/' . $pendaftaran->kartu_bantuan_sosial) }}" alt="Foto Siswa" width="100">
                                @else
                                    Tidak ada file
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('pendaftaran.edit', $pendaftaran->nisn) }}" data-bs-target="#editModal" data-bs-toggle="modal" class="btn btn-warning btn-sm bi bi-pencil-fill"></a>
                                <form action="{{ route('pendaftaran.destroy', $pendaftaran->nisn) }}" method="POST" id="delete-form-{{ $pendaftaran->nisn }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm bi bi-trash-fill" onclick="confirmDelete('{{ $pendaftaran->nisn }}')"></button>
                                </form>
                            </td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
            @foreach ($pendaftarans as $pendaftaran)
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('pendaftaran.update', $pendaftaran->nisn) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama Lengkap -->
                        <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $pendaftaran->nama_lengkap) }}" required maxlength="100">
                        </div>

                        <!-- Tempat Lahir -->
                        <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $pendaftaran->tempat_lahir) }}" required maxlength="100">
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir) }}" required>
                        </div>

                        <!-- Alamat -->
                        <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $pendaftaran->alamat) }}" required>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-laki" {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        </div>

                        <!-- NISN -->
                        <div class="mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" class="form-control" value="{{ old('nisn', $pendaftaran->nisn) }}" name="nisn" pattern="\d{10}" inputmode="numeric"
                        maxlength="10"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $pendaftaran->nomor_telepon) }}" required maxlength="15">
                        </div>

                        <!-- Foto Siswa -->
                        <div class="mb-3">
                        <label for="foto_siswa" class="form-label">Foto Siswa (JPG/PNG)</label>
                        <input type="file" class="form-control" id="foto_siswa" name="foto_siswa" accept=".jpg, .jpeg, .png">
                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                    </div>
                    @endforeach
                </div>
                </div>
            </div>

    @includeIf('layout/script')

    {{-- Tambah --}}
    @stack('scripts')

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.16/dist/sweetalert2.all.min.js"></script>
    <script>
         $(document).ready(function() {
      $('#example').DataTable( {
          dom: 'Bfrtip',
          buttons: [

          ],
          pageLength: 10,
          // columnDefs: [ {
          //     targets: -1,
          //     visible: false
          // } ]
      } );
  } );
    </script>
    <script>
        function confirmDelete(nisn) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data ini akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit form dengan ID yang sesuai dengan nisn
            document.getElementById('delete-form-' + nisn).submit();
        }
    });
}
        </script>
        <script>
            // Menampilkan notifikasi sukses jika ada pesan 'success' di session
            @if (session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif
        </script>
</html>
