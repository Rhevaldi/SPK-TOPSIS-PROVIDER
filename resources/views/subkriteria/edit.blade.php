@extends('layouts.app')

@section('title', 'Edit Sub Kriteria')

@section('content')
<div class="container-fluid">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit Sub Kriteria</h3>
        </div>

        <form action="{{ route('subkriteria.update',$subkriteria) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">

                <div class="form-group">
                    <label>Kriteria</label>
                    <select name="kriteria_id" class="form-control" required>
                        @foreach($kriterias as $k)
                            <option value="{{ $k->id }}"
                                {{ $subkriteria->kriteria_id == $k->id ? 'selected' : '' }}>
                                {{ $k->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Nama Sub Kriteria</label>
                    <input type="text" name="nama"
                           value="{{ $subkriteria->nama }}"
                           class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nilai</label>
                    <input type="number" name="nilai"
                           value="{{ $subkriteria->nilai }}"
                           class="form-control" min="1" max="5" required>
                </div>

            </div>

            <div class="card-footer text-right">
                <a href="{{ route('subkriteria.index') }}" class="btn btn-secondary">Kembali</a>
                <button class="btn btn-warning">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
