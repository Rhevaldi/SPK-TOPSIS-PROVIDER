@extends('layouts.app')


@section('title', 'Data Kriteria')

@section('content')
    <div class="container mt-4">
        <div class="text-center mb-3"> 
        <h3>DAFTAR KRITERIA</h3>
        </div>
        <a href="{{ route('kriteria.create') }}" class="btn btn-primary mb-3">Tambah Kriteria</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kriteria</th>
                    <th>Bobot</th>
                    <th>Tipe</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriterias as $kr)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kr->nama }}</td>
                        <td>{{ $kr->bobot }}</td>
                        <td>{{ $kr->tipe }}</td>
                        <td>
                            <a href="{{ route('kriteria.edit', $kr->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kriteria.destroy', $kr->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
