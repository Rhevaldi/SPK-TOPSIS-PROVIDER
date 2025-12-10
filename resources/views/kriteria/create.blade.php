@extends('layouts.app')


@section('title', 'Tambah kriteria')

@section('content')
<div class="container mt-4">
    <h3>Tambah kriteria Baru</h3>
    <form action="{{ route('kriteria.store') }}" method="POST">
        @csrf
        <div class="mb-3">

            
            <label>Nama Kriteria</label>
            <input type="text" name="nama" class="form-control" required>
            <label>Bobot</label>
            <input type="number" name="bobot" class="form-control" required>
            <label>Tipe</label>
            <select name="tipe" class="form-control" required>
                <option value="benefit">Benefit</option>
                <option value="cost">Cost</option>
            </select>

        
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('operator.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
