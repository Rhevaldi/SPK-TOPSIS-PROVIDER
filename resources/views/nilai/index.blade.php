@extends('layouts.app')

@section('title', 'Data Nilai')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="card-title mb-0">
                <i class="fas fa-clipboard-check"></i> Data Nilai Operator
            </h3>

            <a href="{{ route('nilai.create') }}" class="btn btn-success btn-sm ml-auto">
                <i class="fas fa-plus"></i> Tambah Nilai
            </a>
        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            @php
                $kriteriaList = $nilai->pluck('kriteria.nama', 'kriteria_id')->unique();
                $grouped = $nilai->groupBy('operator_id');
            @endphp

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th rowspan="2" class="align-middle" width="50">No</th>
                            <th rowspan="2" class="align-middle">Operator</th>
                            <th colspan="{{ count($kriteriaList) }}">Kriteria</th>
                            <th rowspan="2" class="align-middle" width="120">Aksi</th>
                        </tr>
                        <tr>
                            @foreach ($kriteriaList as $namaKrit)
                                <th>{{ $namaKrit }}</th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($grouped as $opId => $list)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-left font-weight-bold">
                                    {{ $list->first()->operator->nama }}
                                </td>

                                @foreach ($kriteriaList as $kritId => $namaKrit)
                                    @php
                                        $n = $list->firstWhere('kriteria_id', $kritId);
                                    @endphp
                                    <td>{{ $n?->nilai ?? '-' }}</td>
                                @endforeach

                                <td>
                                    <a href="{{ route('nilai.edit', $opId) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('nilai.destroy', $opId) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus semua nilai operator ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ count($kriteriaList) + 3 }}" class="text-muted">
                                    Data nilai belum tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection
