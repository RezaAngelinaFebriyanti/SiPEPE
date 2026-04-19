@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/create') }}">Tambah</a>
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
                    <label for="id_barang" class="col-1 control-label col-form-label">Filter:</label>
                    <div class="col-3">
                        <select name="id_barang" id="id_barang" class="form-control" required>
                            <option value="">- Semua -</option>
                            @foreach ($barang as $item)
                                <option value="{{ $item->id_barang }}">{{ $item->nama_barang }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Data Barang</small>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-hover table-sm" id="table_barang">
            <thead>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
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
        var dataBarang = $('#table_barang').DataTable({
            serverSide: true,
            ajax: {
                url: "{{ url('barang/list') }}",
                dataType: "json",
                type: "POST",
                "data": function (d) {
                    d.id_barang = $('#id_barang').val();
                }
            },
            columns: [
                {
                    data: "id_barang",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "nama_barang",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "harga",
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
        $('#id_barang').on('change', function() {
            dataBarang.ajax.reload();
        });
    });
</script>
@endpush