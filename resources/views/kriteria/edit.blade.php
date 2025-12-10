@extends('layouts.app')

@section('title', 'Edit Kriteria')

@section('content')
<div class="container mt-4">
    <h3>Edit Kriteria</h3>

    {{-- ERROR VALIDATE --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Kriteria</label>
            <input type="text"
                   name="nama"
                   value="{{ old('nama', $kriteria->nama) }}"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Bobot</label>
            <input type="number"
                   name="bobot"
                   value="{{ old('bobot', $kriteria->bobot) }}"
                   class="form-control"required>
            
        </div>

        <div class="mb-3">
            <label class="form-label">Tipe</label>
            <select name="tipe" class="form-select" required>
                <option value="">-- Pilih Tipe --</option>
                <option value="benefit" {{ old('tipe', $kriteria->tipe) === 'benefit' ? 'selected' : '' }}>Benefit</option>
                <option value="cost"    {{ old('tipe', $kriteria->tipe) === 'cost' ? 'selected' : '' }}>Cost</option>
            </select>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('kriteria.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
