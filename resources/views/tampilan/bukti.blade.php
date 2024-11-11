<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout/style')
    @yield('styles')
    <title>@yield('titles')</title>
    <title>@yield('title')</title>

</head>

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
            <h1 class="m-0">BUKTI PEMBAYARAN</h1>
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
                    <h3 class="card-title"><b>LIST BUKTI PEMBAYARAN</b></h3>
                    <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">

                    </div>
                    </div>
                    </div>

                    <div class="card-body table-responsive p-10">
                        <table class="table table-bordered table-striped" id="example">
                            <thead>
                                <tr>
                                    <th>NISN</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nomor Telepon</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Tanggal Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($uploads as $upload)
                                    <tr>
                                        <td>{{ $upload->nisn }}</td>
                                        <td>{{ $upload->pendaftaran->nama_lengkap ?? 'Tidak ditemukan' }}</td>
                                        <td>{{ $upload->pendaftaran->nomor_telepon ?? 'Tidak ditemukan' }}</td>
                                        <td>
                                            @if ($upload->bukti_pembayaran)
                                                <a href="{{ asset('storage/' . $upload->bukti_pembayaran) }}" target="_blank">
                                                    <img src="{{ asset('storage/' . $upload->bukti_pembayaran) }}" alt="Bukti Pembayaran" width="100">
                                                    Lihat
                                                </a>
                                            @else
                                                Tidak ada bukti pembayaran
                                            @endif
                                        </td>
                                        <td>{{ $upload->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        {{-- @includeIf('layout/footer') --}}

    @includeIf('layout/script')

    {{-- Tambah --}}
    @stack('scripts')

</body>
    <script>
         $(document).ready(function() {
      $('#example').DataTable( {
          dom: 'Bfrtip',
          buttons: [

          ],
          pageLength: 15,
          // columnDefs: [ {
          //     targets: -1,
          //     visible: false
          // } ]
      } );
  } );
    </script>
</html>
