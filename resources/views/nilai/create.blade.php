@extends('layouts.app')

@section('title', 'Input Nilai Operator')

@section('content')

<div class="container-fluid">


<div class="row mt-3 justify-content-center">
    <div class="col-lg-10">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-clipboard-check mr-1"></i>
                    Input Nilai Operator
                </h3>
            </div>

            <form action="{{ route('nilai.store') }}" method="POST">
                @csrf

                <div class="card-body">

                    {{-- Alert Error --}}
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

                    {{-- Pilih Operator --}}
                    <div class="form-group">
                        <label>
                            <i class="fas fa-signal mr-1"></i>
                            Pilih Operator
                        </label>
                        <select name="operator_id" class="form-control" required>
                            <option value="">-- Pilih Operator --</option>
                            @foreach ($operators as $op)
                                <option value="{{ $op->id }}">
                                    {{ $op->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <hr>

                    <h5 class="text-muted mb-3">
                        <i class="fas fa-list-alt mr-1"></i>
                        Nilai Berdasarkan Kriteria
                    </h5>

                    {{-- Loop Kriteria --}}
                    @foreach ($kriteria as $krit)
                        <div class="form-group">
                            <label>{{ $krit->nama }}</label>

                            @if ($krit->subKriteria->count())
                                <select name="nilai[{{ $krit->id }}]" class="form-control" required>
                                    <option value="">-- Pilih Sub Kriteria --</option>
                                    @foreach ($krit->subKriteria as $sub)
                                        <option value="{{ $sub->nilai }}">
                                            {{ $sub->nama }} (Nilai: {{ $sub->nilai }})
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <input type="number"
                                       name="nilai[{{ $krit->id }}]"
                                       class="form-control"
                                       min="1"
                                       max="5"
                                       placeholder="Masukkan nilai 1–5"
                                       required>
                            @endif
                        </div>
                    @endforeach

                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i>
                        Simpan Nilai
                    </button>

                    <a href="{{ route('nilai.index') }}" class="btn btn-secondary ml-2">
                        <i class="fas fa-arrow-left mr-1"></i>
                        Kembali
                    </a>
                </div>

            </form>

        </div>

    </div>
</div>


</div>
@endsection
