@extends('admin.layout.template')

@section('header')
<div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
            <h2 class="text-white pb-2 fw-bold">Data Pertanyaan</h2>
        </div>
        <div class="ml-md-auto py-2 py-md-0">
            <a href="#" class="btn btn-dark btn-round mr-2">Tambah Pertanyaan</a>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row mt--2">
    <div class="col-md-12">
        <div class="card full-height">
            <div class="card-body">
                <div class="card-title">Tambah Pertanyaan Baru</div>
                <div class="card-category">Silahkan isi form berikut.</div>
                <form action="{{ route('admin.pertanyaan.store') }}" method="POST">
                <div class="card-body">
                        @csrf
                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Pilih Periode</label>
                            <div class="col-md-10 p-0">
                                <select name="id_periode" class="form-control input-full" id="inlineinput">
                                    <option value="" disabled selected>Pilih periode...</option>
                                    @foreach($periode as $item)
                                    <option value="{{ $item->id_periode }}">{{ $item->nama_periode }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Pertanyaan</label>
                            <div class="col-md-10 p-0">
                                <textarea name="pertanyaan" class="form-control input-full" id="inlineinput" placeholder="Masukkan Pertanyaan"></textarea>
                            </div>
                        </div>
                </div>
                <div class="card-action text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('bottom')
<script>
$(document).ready(function() {
    $('#basic-datatables').DataTable();
});
</script>
@endpush
