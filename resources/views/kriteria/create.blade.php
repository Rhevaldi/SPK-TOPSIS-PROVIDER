@extends('layouts.app')

@section('title', 'Tambah Kriteria')

@section('content')

<div class="container-fluid">

<div class="row mt-3">
    <div class="col-md-8 offset-md-2">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-plus-circle"></i> Tambah Kriteria Baru
                </h3>
            </div>

            <form action="{{ route('kriteria.store') }}" method="POST">
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

                    <div class="form-group">
                        <label>Nama Kriteria</label>
                        <input type="text"
                               name="nama"
                               class="form-control"
                               placeholder="Contoh: Harga, Kuota, Kecepatan"
                               value="{{ old('nama') }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Bobot Kriteria</label>

                        {{-- Bobot Kriteria dropdown 1 - 5 --}}
                        <select name="bobot" class="form-control" required>
                            <option value="">-- Pilih Bobot --</option>
                            <option value="1" {{ old('bobot') == '1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('bobot') == '2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ old('bobot') == '3' ? 'selected' : '' }}>3</option>
                            <option value="4" {{ old('bobot') == '4' ? 'selected' : '' }}>4</option>
                            <option value="5" {{ old('bobot') == '5' ? 'selected' : '' }}>5</option>
                        </select>
                        
                        <small class="text-muted">
                            Semakin besar bobot, semakin penting kriterianya
                        </small>
                    </div>

                    <div class="form-group">
                        <label>Tipe Kriteria</label>
                        <select name="tipe" class="form-control" required>
                            <option value="">-- Pilih Tipe --</option>
                            <option value="benefit" {{ old('tipe') == 'benefit' ? 'selected' : '' }}>
                                Benefit (Semakin besar semakin baik)
                            </option>
                            <option value="cost" {{ old('tipe') == 'cost' ? 'selected' : '' }}>
                                Cost (Semakin kecil semakin baik)
                            </option>
                        </select>
                    </div>

                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('kriteria.index') }}" class="btn btn-secondary ml-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>
        </div>

    </div>
</div>


</div>
@endsection
