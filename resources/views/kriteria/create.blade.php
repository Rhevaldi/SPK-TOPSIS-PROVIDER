@extends('layouts.app')

@section('title', 'Tambah Kriteria')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Kriteria Baru</h3>
        </div>

        <form action="{{ route('kriteria.store') }}" method="POST">
            @csrf

            <div class="card-body">

                <div class="form-group">
                    <label>Nama Kriteria</label>
                    <input type="text"
                           name="nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama') }}"
                           required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Bobot</label>
                    <input type="number"
                           name="bobot"
                           step="0.01"
                           class="form-control @error('bobot') is-invalid @enderror"
                           value="{{ old('bobot') }}"
                           required>
                    @error('bobot')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tipe</label>
                    <select name="tipe"
                            class="form-control @error('tipe') is-invalid @enderror"
                            required>
                        <option value="">-- Pilih Tipe --</option>
                        <option value="benefit" {{ old('tipe') == 'benefit' ? 'selected' : '' }}>Benefit</option>
                        <option value="cost" {{ old('tipe') == 'cost' ? 'selected' : '' }}>Cost</option>
                    </select>
                    @error('tipe')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('kriteria.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>

        </form>
    </div>

</div>
@endsection
