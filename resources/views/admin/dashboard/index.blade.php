@extends('admin.layout.template')

@section('header')
<div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
            <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
            <h5 class="text-white op-7 mb-2">Selamat datang, <strong>{{ Auth::user()->nama_user ?? 'Guest' }}</strong></h5>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row mt--2">
    <!-- Statistic -->
    <div class="col-md-12">
        <div class="card full-height">
            <div class="card-body">
                <div class="card-category">Periode: </div>
                <div class="card-title">{{ $periode_aktif->nama_periode }}</div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card card-dark bg-primary2">
                            <div class="card-body bubble-shadow">
                                <h5 class="op-8">Jumlah Responden</h5>
                                <h1><i class="fa fa-user"></i> &nbsp; {{ $data_responden }} orang</h1>
                                <div class="pull-right">
                                    <h3 class="fw-bold op-8"></h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-md-4">
                        <div class="card card-dark bg-success2">
                            <div class="card-body bubble-shadow">
                                <h5 class="op-8">Jumlah Pertanyaan</h5>
                                <h1><i class="fa fa-question"></i> &nbsp; {{ $data_pertanyaan }} buah</h1>
                                <div class="pull-right">
                                    <h3 class="fw-bold op-8"></h3>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="col-md-4">
                        <div class="card card-dark bg-info2">
                            <div class="card-body bubble-shadow">
                                <h5 class="op-8">Periode</h5>
                                <h1><i class="fa fa-calendar"></i> &nbsp; {{ $data_periode['total'] }} periode</h1>
                                <div class="pull-right">
                                    <h3 class="fw-bold op-8"></h3>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-md-6">
                        <div class="card card-dark bg-warning2">
                            <div class="card-body bubble-shadow">
                                <h5 class="op-8">Rating</h5>
                                <h1><i class="fa fa-star"></i> &nbsp; {{ $data_rating['avg'] }} dari {{ $data_rating['max'] }}</h1>
                                <div class="pull-right">
                                    <h3 class="fw-bold op-8"></h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('bottom')
<script>

</script>
@endpush
