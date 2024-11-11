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

    <div class="wrapper">
        {{-- ini header --}}
        @includeIf('layout/header')
        {{-- ini sidebar --}}
        @includeIf('layout/sidebar')

            {{-- @stack('before-content') --}}
            <div class="content-wrapper">

                <div class="content-header">
                <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                </div>
                </div>
                </div>
                </div>
                <section class="content">
                    <div class="container-fluid">

                    <div class="row">
                    <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                    <div class="inner">
                    <h3></h3>
                    <p>New Orders</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>

                    <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                    <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Bounce Rate</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>

                    <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                    <div class="inner">
                    <h3>{{ $pendaftaran }}</h3>
                    <p>User Registrations</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ url('table') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>

                    <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                    <div class="inner">
                    <h3>65</h3>
                    <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>

                    </div>
            {{-- @stack('after-content') --}}


        {{-- @includeIf('layout/footer') --}}
    </div>

    @includeIf('layout/script')

    {{-- Tambah --}}
    @stack('scripts')

</body>

</html>
