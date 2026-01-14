@extends('layouts.app')

@section('title', 'Tambah Sub Kriteria')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Sub Kriteria</h3>
        </div>

        <div class="card-body">

            {{-- Alert --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('subkriteria.store') }}" method="POST">
                @csrf

                {{-- Kriteria --}}
                <div class="form-group">
                    <label for="kriteria_id">Kriteria</label>
                    <select name="kriteria_id" id="kriteria_id" class="form-control" required>
                        <option value="">-- Pilih Kriteria --</option>
                        @foreach ($kriteria as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Sub Kriteria --}}
                <div class="form-group">
                    <label for="nama">Sub Kriteria</label>
                    <input type="text" name="nama" id="nama"
                           class="form-control"
                           placeholder="Contoh: 5.000 – 20.000 / > 100 GB"
                           required>
                </div>

                {{-- Nilai --}}
                <div class="form-group">
                    <label for="nilai">Nilai</label>
                    <select name="nilai" id="nilai" class="form-control" required>
                        <option value="">-- Pilih Nilai --</option>
                        <option value="5">5 (Sangat Baik)</option>
                        <option value="4">4 (Baik)</option>
                        <option value="3">3 (Cukup)</option>
                        <option value="2">2 (Kurang)</option>
                        <option value="1">1 (Sangat Kurang)</option>
                    </select>
                </div>

                {{-- Tombol --}}
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('subkriteria.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
