@extends('layouts.app')

@section('title', 'Data Kriteria')

@section('content')
<div class="container-fluid">

    <div class="row mt-3">
        <div class="col-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">
                        <i class="fas fa-list"></i> Data Kriteria
                    </h3>
                    <a href="{{ route('kriteria.create') }}" class="btn btn-primary btn-sm ml-auto">
                        <i class="fas fa-plus"></i> Tambah Kriteria
                    </a>
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                        </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="50">No</th>
                                <th>Nama Kriteria</th>
                                <th width="120">Bobot</th>
                                <th width="120">Tipe</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kriterias as $kr)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $kr->nama }}</td>
                                    <td class="text-center">{{ $kr->bobot }}</td>
                                    <td class="text-center">
                                        <span class="badge badge-{{ $kr->tipe == 'benefit' ? 'success' : 'danger' }}">
                                            {{ ucfirst($kr->tipe) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('kriteria.edit', $kr->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('kriteria.destroy', $kr->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus kriteria ini?')">
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
                                    <td colspan="5" class="text-center text-muted">
                                        Data kriteria belum tersedia
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
