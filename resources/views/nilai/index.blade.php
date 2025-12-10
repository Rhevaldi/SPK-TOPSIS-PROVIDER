@extends('layouts.app')

@section('title', 'Data Nilai')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Nilai Operator</h3>
        <a href="{{ route('nilai.create') }}" class="btn btn-success">+ Tambah Nilai</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @php
        // ambil list kriteria unik dari data nilai
        $kriteriaList = $nilai->pluck('kriteria.nama', 'kriteria_id')->unique();
        $grouped = $nilai->groupBy('operator_id');
    @endphp

    <table class="table table-bordered text-center align-middle">
        <thead class="table-light">
            <tr>
                <th rowspan="2" class="align-middle">No</th>
                <th rowspan="2" class="align-middle">Operator</th>
                <th colspan="{{ count($kriteriaList) }}">Kriteria</th>
                <th rowspan="2" class="align-middle">Aksi</th>
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
                    <td>{{ $list->first()->operator->nama }}</td>
                    @foreach ($kriteriaList as $kritId => $namaKrit)
                        @php
                            $n = $list->where('kriteria_id', $kritId)->first();
                        @endphp
                        <td>{{ $n ? $n->nilai : '-' }}</td>
                    @endforeach
                    <td>
                        <a href="{{ route('nilai.edit', $opId) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('nilai.destroy', $opId) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus semua nilai operator ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($kriteriaList) + 3 }}">Belum ada data nilai.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
