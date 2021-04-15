@extends('admin.layout.template')

@section('header')
<div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
            <h2 class="text-white pb-2 fw-bold">Data Responden</h2>
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
                <div class="card-title">Daftar Responden</div>
                <div class="card-category">Berisi daftar responden yang telah mengisi kuesioner dan ulasan atau masukan.</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Responden</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                    <th>Pekerjaan</th>
                                    <th>Jenis Kelamin</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>    
                            @foreach($responden as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_responden }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->no_hp }}</td>
                                    <td>{{ $item->keterangan == '' ? '-' : $item->keterangan }}</td>
                                    <td>{{ $item->jenis_kel == "L" ? "Laki-laki" : "Perempuan" }}</td>
                                    <!-- <td>
                                        <div class="btn-group">
                                        <a href="{{ route('admin.responden.edit', $item->id_responden) }}" class="btn btn-warning btn-sm ml-2">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        </div>
                                    </td> -->
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
