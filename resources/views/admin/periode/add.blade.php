@extends('admin.layout.template')

@section('header')
<div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
            <h2 class="text-white pb-2 fw-bold">Tambah Periode</h2>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row mt--2">
    <div class="col-md-12">
        <div class="card full-height">
            <form action="{{ route('admin.periode.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="card-title">Tambah Periode Baru</div>
                    <div class="card-category">Silahkan isi form berikut.</div>
                    <div class="card-body">
                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Nama Periode</label>
                            <div class="col-md-10 p-0">
                                <input name="nama_periode" type="text" class="form-control input-full" placeholder="Masukkan nama periode...">
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Tahun Periode</label>
                            <div class="col-md-10 p-0">
                                <select name="tahun_periode" class="form-control input-full">
                                    @for($i = date('Y') + 5; $i >= 2017; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Tanggal Mulai</label>
                            <div class="col-md-10 p-0">
                                <input class="form-control input-full" type="date" name="tgl_mulai" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Tanggal Selesai</label>
                            <div class="col-md-10 p-0">
                                <input class="form-control input-full" type="date" name="tgl_selesai" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Status</label>
                            <div class="col-md-10 p-0">
                                <select class="form-control input-full" name="status">
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-action text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('bottom')
<script>
$(document).ready(function() {
    //
});
</script>
@endpush
