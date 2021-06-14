<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sertifikasi - @yield('head_title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/fontawesome-free/css/all.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte3/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/asesi" class="brand-link text-center">
            <span class="brand-text font-weight-light">Sertifikasi</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <p class="text-light">
                        {{ Auth::user()->username }}<br>
                        {{ Auth::user()->role }}
                    </p>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/asesi" class="nav-link @yield('sidebar-dashboard-active')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"class="nav-link">Log Out</button>
                    </form>
                </li>

                <li class="nav-header">KELOLA AKUN</li>
                <li class="nav-item">
                    <a href="/asesi/lihat-data" class="nav-link @yield('sidebar-show-active')">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Lihat data
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/asesi/edit-data" class="nav-link @yield('sidebar-edit-active')">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Edit Data
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="/admin/kelola-asesor" class="nav-link @yield('sidebar-asesor-active')">
                        <i class="nav-icon fas fa-user-check"></i>
                        <p>
                            Asesor
                        </p>
                    </a>
                </li>

                <li class="nav-header">HEADER</li>
                <li class="nav-item">
                    <a href="/admin/negara" class="nav-link @yield('sidebar-negara-active')">
                        <i class="nav-icon far fa-flag"></i>
                        <p>
                            Referensi Negara
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/prodi" class="nav-link @yield('sidebar-prodi-active')">
                        <i class="nav-icon fas fa-university"></i>
                        <p>
                            Program Studi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/kegiatan" class="nav-link @yield('sidebar-kegiatan-active')">
                        <i class="nav-icon fas fa-child"></i>
                        <p>
                            Kegiatan
                        </p>
                    </a>
                </li> -->
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        {{-- <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved. --}}
    </footer>

    <!-- jQuery -->
    <script src="{{asset('adminlte3/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{asset('adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- AdminLTE App -->
    <script src="{{asset('adminlte3/dist/js/adminlte.min.js')}}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('adminlte3/dist/js/demo.js')}}"></script>
</body>
</html>
