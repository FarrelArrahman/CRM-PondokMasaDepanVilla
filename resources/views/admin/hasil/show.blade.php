@extends('admin.layout.template')

@section('header')
<div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
            <h2 class="text-white pb-2 fw-bold">Data Penilaian Responden</h2>
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
                <form action="{{ route('admin.hasil.pdf', $data_responden->id_responden) }}">
                    <button type="submit" class="ml-3 btn btn-danger pull-right">Download Laporan</button>
                </form>
                <div class="card-body">
                    <table class="table">
                    <tr>
                        <th width="200">Nama Responden</th>
                        <td>{{ $data_responden->nama_responden }}</td>
                    </tr>
                    <tr>
                        <th width="200">Pekerjaan</th>
                        <td>{{ $data_responden->keterangan == '' ? '-' : $data_responden->keterangan }}</td>
                    </tr>
                    <tr>
                        <th width="200">Periode Kuesioner</th>
                        <td>{{ $data_responden->kuesioner->first()->pertanyaan->periode->nama_periode }}</td>
                    </tr>
                    <tr>
                        <th width="200">Tanggal Input</th>
                        <td>{{ $data_responden->ulasan->tgl_input->isoFormat('dddd, D MMMM Y') }}</td>
                    </tr>
                    <tr>
                        <th width="200">Rata-rata nilai</th>
                        <td>{{ round($nilai, 2) }}</td>
                    </tr>
                    <tr>
                        <th width="200">Ulasan responden</th>
                        <td>{{ $data_responden->ulasan->ulasan_masukan }}</td>
                    </tr>
                    </table>
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pertanyaan</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_responden->kuesioner as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->pertanyaan->pertanyaan }}</td>
                                    <td>{{ $item->nilai }}</td>
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
