@extends('layouts.app')

@section('title', 'Edit Operator')

@section('content')
<div class="container-fluid">

    <div class="row justify-content-center mt-3">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i> Edit Operator
                    </h3>
                </div>

                <form action="{{ route('operator.update', $operator->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Operator</label>
                            <input type="text"
                                   name="nama"
                                   value="{{ $operator->nama }}"
                                   class="form-control"
                                   placeholder="Masukkan nama operator"
                                   required>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update
                        </button>
                        <a href="{{ route('operator.index') }}" class="btn btn-secondary ml-2">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </div>

</div>
@endsection
