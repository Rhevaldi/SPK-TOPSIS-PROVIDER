@extends('layouts.app')


@section('title', 'Tambah Operator')

@section('content')
<div class="container mt-4">
    <h3>Tambah Operator Baru</h3>
    <form action="{{ route('operator.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Operator</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('operator.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
