@extends('layouts.app')

@section('title', 'Tambah Operator')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Operator Baru</h3>
        </div>

        <form action="{{ route('operator.store') }}" method="POST">
            @csrf

            <div class="card-body">

                <div class="form-group">
                    <label>Nama Operator</label>
                    <input type="text"
                           name="nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama') }}"
                           required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('operator.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>

        </form>
    </div>

</div>
@endsection
