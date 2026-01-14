@extends('layouts.app')

@section('title', 'Data Sub Kriteria')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0"><i class="fas fa-list"></i> Data Sub Kriteria</h3>
            <a href="{{ route('subkriteria.create') }}" class="btn btn-primary btn-sm ml-auto">
                <i class="fas fa-plus"></i> Tambah Sub Kriteria
            </a>
        </div>

        <div class="card-body">

            {{-- FILTER DROPDOWN --}}
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="font-weight-bold">Filter Kriteria</label>
                    <select id="filterKriteria" class="form-control">
                        <option value="all">Semua Kriteria</option>
                        @foreach ($data->pluck('kriteria.nama')->unique() as $krit)
                            <option value="{{ $krit }}">{{ $krit }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover text-center align-middle">
                <thead class="thead-light">
                    <tr>
                        <th width="5%">No</th>
                        <th width="25%">Kriteria</th>
                        <th>Sub Kriteria</th>
                        <th width="10%">Nilai</th>
                        <th width="10%">Tipe</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp

                    @foreach ($data->groupBy('kriteria.nama') as $namaKriteria => $items)
                        @foreach ($items as $index => $d)
                            <tr class="row-kriteria" data-kriteria="{{ $namaKriteria }}">
                                <td>{{ $no++ }}</td>

                                @if ($index === 0)
                                    <td rowspan="{{ $items->count() }}" class="align-middle font-weight-bold bg-light">
                                        {{ $namaKriteria }}
                                    </td>
                                @endif

                                <td class="text-left">{{ $d->nama }}</td>

                                <td>
                                    <span class="badge badge-info">{{ $d->nilai }}</span>
                                </td>

                                <td>
                                    <span class="badge badge-{{ $d->kriteria->tipe == 'benefit' ? 'success' : 'danger' }}">
                                        {{ ucfirst($d->kriteria->tipe) }}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('subkriteria.edit', $d->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form method="POST"
                                          action="{{ route('subkriteria.destroy', $d->id) }}"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin hapus sub kriteria ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach

                    @if($data->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Data sub kriteria belum tersedia
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>

</div>

<script>
document.getElementById('filterKriteria').addEventListener('change', function () {
    const selected = this.value;
    const rows = document.querySelectorAll('.row-kriteria');

    rows.forEach(row => {
        if (selected === 'all' || row.dataset.kriteria === selected) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>
@endsection
