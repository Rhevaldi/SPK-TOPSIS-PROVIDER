@extends('layouts.app')

@section('title', 'Edit Kriteria')

@section('content')
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-8 offset-md-2">

            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i> Edit Kriteria
                    </h3>
                </div>

                <form action="{{ route('kriteria.update', $kriteria) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label>Nama Kriteria</label>
                            <input type="text"
                                   name="nama"
                                   value="{{ old('nama', $kriteria->nama) }}"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Bobot</label>
                            <input type="number"
                                   name="bobot"
                                   value="{{ old('bobot', $kriteria->bobot) }}"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Tipe</label>
                            <select name="tipe" class="form-control" required>
                                <option value="benefit" {{ $kriteria->tipe == 'benefit' ? 'selected' : '' }}>
                                    Benefit
                                </option>
                                <option value="cost" {{ $kriteria->tipe == 'cost' ? 'selected' : '' }}>
                                    Cost
                                </option>
                            </select>
                        </div>

                    </div>

                    <div class="card-footer text-right">
                        <a href="{{ route('kriteria.index') }}" class="btn btn-secondary">
                            Kembali
                        </a>
                        <button class="btn btn-warning">
                            Update
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
@endsection
