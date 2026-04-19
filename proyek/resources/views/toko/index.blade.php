@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('toko/create') }}">Tambah</a>
        </div>
    </div>

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="id_toko" class="col-1 control-label col-form-label">Filter:</label>
                    <div class="col-3">
                        <select name="id_toko" id="id_toko" class="form-control" required>
                            <option value="">- Semua -</option>
                            @foreach ($toko as $item)
                                <option value="{{ $item->id_toko }}">{{ $item->nama_toko }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Toko</small>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-hover table-sm" id="table_toko">
            <thead>
                <tr>
                    <th>ID Toko</th>
                    <th>Nama Toko</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
<script>
    $(document).ready(function() {
        var dataToko = $('#table_toko').DataTable({
            serverSide: true,
            ajax: {
                url: "{{ url('toko/list') }}",
                dataType: "json",
                type: "POST",
                "data": function (d) {
                    d.id_toko = $('#id_toko').val();
                }
            },
            columns: [
                {
                    data: "id_toko",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "nama_toko",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "aksi",
                    orderable: false,
                    searchable: false
                }
            ]
        });
        $('#id_toko').on('change', function() {
            dataToko.ajax.reload();
        });
    });
</script>
@endpush