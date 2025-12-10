@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<h3 class="mb-4">Dashboard</h3>

<div class="row">

    
    <div class="col-md-4 mb-4">
        <div class="card card-custom p-3">
            <h5>Total Operator</h5>
            <h2 class="fw-bold text-primary">{{ \App\Models\Operator::count() }}</h2>
            <a href="{{ route('operator.index') }}" class="btn btn-primary btn-action mt-2">Lihat Operator</a>
        </div>
    </div>

    
    <div class="col-md-4 mb-4">
        <div class="card card-custom p-3">
            <h5>Total Kriteria</h5>
            <h2 class="fw-bold text-primary">{{ \App\Models\Kriteria::count() }}</h2>
            <a href="{{ route('kriteria.index') }}" class="btn btn-success btn-action mt-2">Lihat Kriteria</a>
        </div>
    </div>


    <div class="col-md-4 mb-4">
        <div class="card card-custom p-3">
            <h5>Total Nilai</h5>
            <h2 class="fw-bold text-primary">{{ \App\Models\Nilai::count() }}</h2>
            <a href="{{ route('nilai.index') }}" class="btn btn-warning btn-action mt-2">Lihat Nilai</a>
        </div>
    </div>

</div>

@endsection
