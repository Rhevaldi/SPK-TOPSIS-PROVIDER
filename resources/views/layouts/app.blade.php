<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SPK TOPSIS')</title>

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar (optional, bisa ditambah nanti) -->

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Brand Logo -->
            <a href="{{ route('welcome') }}" class="brand-link">
                <img src="{{ asset('dist/img/iconSPK.jpg') }}" alt="Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SPK TOPSIS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                {{-- <!-- User Panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Administrator</a>
                    </div>
                </div> --}}

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" role="menu">

                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('operator.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-signal"></i>
                                <p>Operator</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('kriteria.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Kriteria</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('subkriteria.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Sub Kriteria</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('nilai.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-check"></i>
                                <p>Nilai</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('topsis.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>Hasil Perhitungan</p>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper p-3">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="main-footer text-center">
            <strong>SPK PEMILIHAN TOPSIS &copy; {{ date('Y') }}</strong>
        </footer>

    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    <!-- AdminLTE -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>

</html>
