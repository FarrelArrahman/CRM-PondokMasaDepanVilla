@extends('admin.layout.template')

@section('header')
<div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
            <h2 class="text-white pb-2 fw-bold">Edit Periode</h2>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row mt--2">
    <div class="col-md-12">
        <div class="card full-height">
            <form action="{{ route('admin.periode.update', $periode->id_periode) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="card-title">Edit Periode</div>
                    <div class="card-category">Silahkan ubah data berikut.</div>
                    <div class="card-body">
                    <input type="hidden" name="id_periode" value="{{ $periode->nama_periode }}">
                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Nama Periode</label>
                            <div class="col-md-10 p-0">
                                <input name="nama_periode" type="text" class="form-control input-full" placeholder="Masukkan nama periode..." value="{{ $periode->nama_periode }}">
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Tahun Periode</label>
                            <div class="col-md-10 p-0">
                                <select name="tahun_periode" class="form-control input-full">
                                    @for($i = date('Y') + 5; $i >= 2017; $i--)
                                        <option @if($periode->tahun_periode == $i) {{ 'selected' }} @endif value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Tanggal Mulai</label>
                            <div class="col-md-10 p-0">
                                <input class="form-control input-full" type="date" name="tgl_mulai" value="{{ date('Y-m-d', strtotime($periode->tgl_mulai)) }}">
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Tanggal Selesai</label>
                            <div class="col-md-10 p-0">
                                <input class="form-control input-full" type="date" name="tgl_selesai" value="{{ date('Y-m-d', strtotime($periode->tgl_selesai)) }}">
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Status</label>
                            <div class="col-md-10 p-0">
                                <select class="form-control input-full" name="status">
                                    <option @if($periode->tahun_periode == '1') {{ 'selected' }} @endif value="1">Aktif</option>
                                    <option @if($periode->tahun_periode == '0') {{ 'selected' }} @endif value="0">Tidak Aktif</option>
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
