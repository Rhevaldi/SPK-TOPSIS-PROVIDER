@extends('layouts.app')

@section('title', 'Data Operator')

@section('content')
<div class="container mt-4">
    <div class="text-center"> <h2>DAFTAR OPERATOR</h2> </div> 
    <br>
    <a href="{{ route('operator.create') }}" class="btn btn-primary mb-3">Tambah Operator</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Operator</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($operators as $op)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $op->nama }}</td>
                <td>
                    <a href="{{ route('operator.edit', $op->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('operator.destroy', $op->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
