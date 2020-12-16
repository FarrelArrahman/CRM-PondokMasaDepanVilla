@extends('admin.layout.template')

@section('header')
<div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
            <h2 class="text-white pb-2 fw-bold">Data User</h2>
        </div>
        <div class="ml-md-auto py-2 py-md-0">
            <a href="{{ route('admin.user.create') }}" class="btn btn-dark btn-round mr-2">Tambah User</a>
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
                <div class="card-title">Daftar User</div>
                <div class="card-category">Berisi user yang dapat melakukan login pada sistem.</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama User</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>    
                            @foreach($user as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_user }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->no_hp }}</td>
                                    <td>{{ $item->jenis_kel }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <div class="btn-group">
                                        <a href="{{ route('admin.user.edit', $item->id_user) }}" class="btn btn-warning btn-sm ml-2">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.user.destroy', $item->id_user) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm ml-2" style="margin-right: 5px;"
                                                onclick="return confirm('Apakah yakin ingin menghapus?');"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </form>
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
