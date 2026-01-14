@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="container-fluid">

    <div class="row justify-content-center mt-4">
        <div class="col-md-10">

            <div class="card text-center">
                <div class="card-body">

                    <h1 class="mb-3 font-weight-bold">
                        Selamat Datang di Sistem SPK TOPSIS
                    </h1>

                    <p class="text-muted mb-4">
                        Sistem Pendukung Keputusan Pemilihan Paket Internet Operator Telekomunikasi
                        Terbaik di Loa Kulu
                    </p>

                    <i class="fas fa-chart-line fa-4x text-primary mb-3"></i>

                    <div class="mt-4">

                        <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-lg">
                            <i class="fas fa-database"></i> Dashboard
                        </a>

                        
                        <a href="{{ route('topsis.index') }}" class="btn btn-primary btn-lg mr-2">
                            <i class="fas fa-calculator"></i> Lihat Hasil TOPSIS
                        </a>

                        
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
