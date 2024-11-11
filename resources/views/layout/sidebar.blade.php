
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    /* Mengatur background sidebar menjadi putih dengan bayangan */
    .main-sidebar {
        background-color: #ffffff;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        color: #333;
    }

    /* Styling pada link sidebar */
    .sidebar .nav-link {
        color: #333;
        font-weight: 500;
        padding: 10px 20px;
        border-radius: 8px;
        transition: background-color 0.3s, color 0.3s;
    }

    .sidebar .nav-link:hover, .sidebar .nav-link.active {
        background-color: #e5f3ff;
        color: #007bff;
    }

    /* Styling untuk icon dan teks link sidebar */
    .sidebar .nav-icon {
        margin-right: 8px;
        color: #007bff;
    }

    /* User panel styling */


    .user-panel .nama a, .user-panel .online a {
        color: #333;
        font-weight: 600;
    }

    .user-panel .online a {
        color: #28a745;
    }

    /* Mengatur warna heading dan content di dashboard */
    .content-wrapper {
        background-color: #f8f9fa;
        font-family: 'Inter', sans-serif;
    }

    .content-header h1 {
        font-size: 24px;
        color: #333;
        font-weight: 700;
    }

    /* Styling tabel */
    table.dataTable {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    table.dataTable th, table.dataTable td {
        border-bottom: 1px solid #e0e0e0;
        padding: 12px 15px;
        font-size: 14px;
        color: #333;
    }

    table.dataTable thead th {
        background-color: #f1f5f9;
        color: #333;
        font-weight: 600;
    }

    table.dataTable tbody tr:hover {
        background-color: #f9fbfd;
    }

    .table-responsive {
        border-radius: 8px;
        overflow: hidden;
    }

    /* Styling tombol */
    .btn {
        background-color: #007bff;
        color: white;
        padding: 8px 12px;
        font-size: 14px;
        border-radius: 8px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #0056b3;
        color: white;
    }

</style>
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;1,400&family=Open+Sans:wght@300;400;600&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgb(72, 163, 238)">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src= "https://smaspgri1kotabekasi.sch.id/logo-sma.png" alt="SMAPGRI Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold">SMA PGRI 1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image pull-left mt-2">
            {{-- <a href="{{ route('pegawai.show', $value->id) }}"> --}}
            <img src="{{ asset('/AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" width='15px'
                height='40px' alt="User Image"></a>
        </div>
        <div class="pull-left info mb-3">
            <div class="nama">
                <a style="color: rgb(255, 255, 255)">Admin</a>
            </div>
            <div class="online mt-1" style="font-size: 12px">
                <a style="color: rgb(0, 253, 63)">Online</a>
            </div>
            {{-- atau
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
                <a style="color: rgb(0, 253, 63)">Online</a>
              </div> --}}
        </div>
        {{-- kalau menggunakan session hak akses
        <div class="pull-left info mb-3">
            <div class="nama">
                <a style="color: rgb(255, 255, 255)">{{ Session::get('user')[0]['namaL'] }}</a>
            </div>
            <div class="online mt-1" style="font-size: 12px">
                <a style="color: rgb(255, 255, 255)">{{ Session::get('user')[0]['jabatan'] }}
            </div>
        </div> --}}

      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link">
                    <i class="fa-solid fa-house"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-person"></i>
                  <p>
                    Administrasi
                  </p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('pendaftaran.index') }}" class="nav-link">
                            <i class="fa-solid fa-person"></i>
                          <p>
                            Pendaftaran
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('tablebukti.index') }}" class="nav-link">
                            <i class="fa-solid fa-person"></i>
                          <p>
                            Bukti Pembayaran
                          </p>
                        </a>
                      </li>
                </ul>
              </li>
          <li class="nav-item">
            <a href="{{ route('crudberita.index') }}" class="nav-link">
                <i class="fa-solid fa-newspaper"></i>
              <p>
                Berita
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('laporan') }}" class="nav-link">
                <i class="fa-solid fa-copy"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>
