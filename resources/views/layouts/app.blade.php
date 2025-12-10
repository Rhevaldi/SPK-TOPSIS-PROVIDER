<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SPK TOPSIS')</title>

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        
        <nav class="main-header navbar navbar-expand navbar-dark bg-dark">
            <div class="w-100 d-flex justify-content-center">
                <span class="navbar-text text-white text-center">SPK TOPSIS</span>
            </div>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ url('/') }}" class="brand-link text-center">
                <span class="brand-text font-weight-light">Pemilihan Operator</span>
            </a>

            <div class="sidebar">
                <nav class="mt-3">
                    <ul class="nav nav-pills nav-sidebar flex-column">

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

        
        <div class="content-wrapper p-3">
            @yield('content')
        </div>

        
        <footer class="main-footer text-center">
            <strong>SPK PEMILIHAN TOPSIS &copy; {{ date('Y') }}</strong>
        </footer>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
