@extends('admin.layout.template')

@section('header')
<div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
            <h2 class="text-white pb-2 fw-bold">Data Ulasan dan Masukan</h2>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row mt--2">
    @if(session()->has('message'))
    <div class="col-md-12">
        <div class="alert alert-{{ session()->get('status') }}">{{ session()->get('message') }}</div>
    </div>
    @endif
    <div class="col-md-12">
        <div class="card full-height">
            <div class="card-body">
                <div class="card-title">Daftar Ulasan dan Masukan</div>
                <div class="card-category">Berisi daftar ulasan dan masukan yang telah diisi oleh responden.</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Responden</th>
                                    <th>Ulasan atau Masukan</th>
                                    <th>Periode</th>
                                    <th>Tanggal Input</th>
                                    <!-- <th>Keterangan</th> -->
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>    
                            @foreach($ulasanMasukan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->responden->nama_responden }}</td>
                                    <td>{{ $item->ulasan_masukan }}</td>
                                    <td>{{ $item->periode->nama_periode }}</td>
                                    <td>{{ $item->tgl_input->isoFormat('D MMMM Y') }}</td>
                                    <!-- <td>{{ $item->keterangan }}</td> -->
                                    <td>
                                        <div class="btn-group">
                                        <a href="{{ route('admin.hasil.show', $item->id_responden) }}" class="btn btn-info btn-sm ml-2">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('bottom')
<script>
$(document).ready(function() {
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
    });

    $('#basic-datatables').DataTable();
});
</script>
@endpush
