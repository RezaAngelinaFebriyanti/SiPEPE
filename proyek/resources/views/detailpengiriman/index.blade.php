@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('DetailPengiriman/create') }}">Tambah</a>
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

        <table class="table table-bordered table-hover table-sm" id="table_detail_pengiriman">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Toko</th>
                    <th>Tgl Kirim</th>
                    <th>Jumlah Kirim</th>
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
        var dataDetailPengiriman = $('#table_detail_pengiriman').DataTable({
            serverSide: true,
            ajax: {
                url: "{{ url('DetailPengiriman/list') }}",
                dataType: "json",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "data": function (d) {
                    d.id_toko = $('#id_toko').val();
                }
            },
            columns: [
                { data: "id_detail_pengiriman" },
                { data: "nama_toko" },
                { data: "tgl_kirim" },
                { data: "jumlah_kirim" },
                { data: "aksi" }
            ]
        });
        $('#id_toko').on('change', function() {
            dataDetailPengiriman.ajax.reload();
        });
    });
</script>
@endpush