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
                <div class="row mt-5">
                    <div class="col-md-12">
                        <form action="" method="POST">
                            <div class="form-inline pull-right">
                                <label for="pilih-periode" class="mr-3">Pilih Periode</label>
                                <select id="pilih-periode" class="form-control">
                                    @foreach($data_periode as $periode)
                                    <option value="{{ $periode->tahun_periode }}">{{ $periode->tahun_periode }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <h3 class="text-center">Jumlah Responden</h3>
                        <canvas id="canvas-jumlah-responden"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('bottom')
<script>
    function loadContent() {
        var periode = $('#pilih-periode').val();
        var url = "{{ route('get-responden', '') }}/" + periode;
        fetch(url).then(response => response.json())
            .then(function(data){
                // console.log(data);

                setChart(data.bulan, data.responden, data.max);
            }).catch(function(e){
                alert("gagal mengambil data");
            });
            
    }

    function setChart(bulan, responden, max) {
        var chartData = {
            labels: bulan,
            datasets: [{
                label: "Responden",
                backgroundColor: "#E74C3C",
                data: responden
            }]
        };

        var canvas = document.getElementById('canvas-jumlah-responden');
        var myBarChart = new Chart(canvas, {
            type: "bar",
            data: chartData,
            options: {
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            min: 0,
                            max: max
                        }
                    }]
                }
            }
        });

        console.log("ini jalan gan");
    }
    
    $(document).ready(function () {
        loadContent();
        $('#pilih-periode').change(function () {
            loadContent();
        });
    });
</script>
@endpush
