<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout/style')
    <title>Laporan</title>
</head>

<body class="hold-transition skin-blue sidebar-mini">
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
                            <h1 class="m-0">LAPORAN PENDAFTARAN SISWA</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Laporan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Pendaftaran</h3>
                            </div>

                            <div class="card-body table-responsive">
                                <table class="table table-hover text-nowrap" id="laporanTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>NISN</th>
                                            <th>Nomor Telepon</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pendaftarans as $pendaftaran)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pendaftaran->nama_lengkap }}</td>
                                            <td>{{ $pendaftaran->tempat_lahir }}</td>
                                            <td>{{ $pendaftaran->tanggal_lahir }}</td>
                                            <td>{{ $pendaftaran->alamat }}</td>
                                            <td>{{ $pendaftaran->jenis_kelamin }}</td>
                                            <td>{{ $pendaftaran->nisn }}</td>
                                            <td>{{ $pendaftaran->nomor_telepon }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- @includeIf('layout/footer') --}}
        @includeIf('layout/script')
    </div>
    <script>
        $(document).ready(function() {
        $('#laporanTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    title : 'Laporan Calon Siswa Baru',
                    className: 'btn btn-primary',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                  extend: 'pdfHtml5',
                  title: 'Calon Siswa Baru',
                  orientation: 'landscape',
                  pageSize: 'LEGAL'
              },
                'copy', 'csv', 'excel',
                'colvis'
            ],
            pageLength: 50,
            columnDefs: [ {
                targets: -1,
                visible: false
            } ]
        } );
    } );
      </script>
</body>

</html>
