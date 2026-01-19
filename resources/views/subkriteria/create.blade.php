@extends('layouts.app')

@section('title', 'Tambah Sub Kriteria')

@section('content')
<div class="container-fluid">

    <div class="row mt-3 justify-content-center">
        <div class="col-lg-8">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus-circle"></i> Tambah Sub Kriteria
                    </h3>
                </div>

                <form action="{{ route('subkriteria.store') }}" method="POST">
                    @csrf

                    <div class="card-body">

                        {{-- ERROR VALIDASI --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <strong>Terjadi kesalahan!</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                            </div>
                        @endif

                        {{-- Kriteria --}}
                        <div class="form-group">
                            <label>Kriteria</label>
                            <select name="kriteria_id"
                                    class="form-control @error('kriteria_id') is-invalid @enderror"
                                    required>
                                <option value="">-- Pilih Kriteria --</option>
                                @foreach($kriterias as $k)
                                    <option value="{{ $k->id }}"
                                        {{ old('kriteria_id') == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kriteria_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Sub Kriteria --}}
                        <div class="form-group">
                            <label>Sub Kriteria</label>
                            <input type="text"
                                   name="nama"
                                   class="form-control @error('nama') is-invalid @enderror"
                                   value="{{ old('nama') }}"
                                   placeholder="Contoh: 5.000 – 20.000"
                                   required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Nilai --}}
                        <div class="form-group">
                            <label>Nilai</label>
                            <select name="nilai"
                                    class="form-control @error('nilai') is-invalid @enderror"
                                    required>
                                <option value="">-- Pilih Nilai --</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}"
                                        {{ old('nilai') == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                            @error('nilai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer text-right">
                        <a href="{{ route('subkriteria.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</div>
@endsection
