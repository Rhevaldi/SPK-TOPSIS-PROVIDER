@extends('layouts.app')


@section('title', 'Edit Operator')

@section('content')
<div class="container mt-4">
    <h3>Edit Operator</h3>
    <form action="{{ route('operator.update', $operator->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Operator</label>
            <input type="text" name="nama" value="{{ $operator->nama }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('operator.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
