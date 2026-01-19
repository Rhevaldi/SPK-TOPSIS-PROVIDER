@extends('layouts.app')

@section('title', 'Edit Nilai Operator')

@section('content')

<div class="container-fluid">

<div class="row justify-content-center mt-3">
    <div class="col-lg-10">

        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i> Edit Nilai - {{ $operator->nama }}
                </h3>
            </div>

            <form action="{{ route('nilai.store') }}" method="POST">
                @csrf

                <input type="hidden" name="operator_id" value="{{ $operator->id }}">

                <div class="card-body">

                    @foreach ($kriteria as $krit)
                        <div class="form-group mb-3">
                            <label>{{ $krit->nama }}</label>

                            @if ($krit->subKriteria->count())
                                <select name="nilai[{{ $krit->id }}]" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($krit->subKriteria as $sub)
                                        <option value="{{ $sub->nilai }}"
                                            {{ ($existingNilai[$krit->id] ?? null) == $sub->nilai ? 'selected' : '' }}>
                                            {{ $sub->nama }} ({{ $sub->nilai }})
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <small class="form-text text-muted">
                                    <em>
                                        <i class="fas fa-info-circle mr-1"></i>
                                        Kriteria ini tidak memiliki sub kriteria. Silakan input sub kriteria terlebih dahulu.
                                    </em>
                                </small>
                            @endif
                        </div>
                    @endforeach

                </div>

                <div class="card-footer text-right">
                    <button class="btn btn-warning">
                        <i class="fas fa-save"></i> Update Nilai
                    </button>
                    <a href="{{ route('nilai.index') }}" class="btn btn-secondary ml-2">
                        Kembali
                    </a>
                </div>

            </form>

        </div>

    </div>
</div>


</div>
@endsection
