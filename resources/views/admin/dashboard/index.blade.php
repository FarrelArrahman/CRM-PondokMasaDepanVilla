@extends('admin.layout.template')

@section('header')
<div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
            <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
            <h5 class="text-white op-7 mb-2">Selamat datang, <strong>{{ Auth::user()->nama ?? 'Guest' }}</strong></h5>
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
                <div class="card-title">Statistik</div>
                <div class="card-category">Informasi grafik pada Sistem Informasi E-voting UKM MCOS</div>
                <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div data-anggota="1" id="circles-1"></div>
                        <h6 class="fw-bold mt-3 mb-0">Anggota Aktif UKM MCOS</h6>
                    </div>
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div data-kandidat="1" id="circles-2"></div>
                        <h6 class="fw-bold mt-3 mb-0">Kandidat Calon Ketua UKM MCOS</h6>
                    </div>
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div data-belum-vote="1" id="circles-4"></div>
                        <h6 class="fw-bold mt-3 mb-0">Jumlah anggota belum memilih</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('bottom')
<script>
var anggota = $('#circles-1').data('anggota');
    var kandidat = $('#circles-2').data('kandidat');
    var sudah_vote = $('#circles-3').data('sudah-vote');
    var belum_vote = $('#circles-4').data('belum-vote');

    Circles.create({
        id:'circles-1',
        radius:45,
        value:anggota,
        maxValue:anggota,
        width:7,
        text:anggota,
        colors:['#f1f1f1', '#FF9E27'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    });

    Circles.create({
        id:'circles-2',
        radius:45,
        value:kandidat,
        maxValue:kandidat,
        width:7,
        text:kandidat,
        colors:['#f1f1f1', '#2BB930'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    });

    Circles.create({
        id:'circles-3',
        radius:45,
        value:sudah_vote,
        maxValue:anggota,
        width:7,
        text:sudah_vote,
        colors:['#f1f1f1', '#0099ff'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    });

    Circles.create({
        id:'circles-4',
        radius:45,
        value:belum_vote,
        maxValue:anggota,
        width:7,
        text:belum_vote,
        colors:['#f1f1f1', '#9900ff'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })
</script>
@endpush
