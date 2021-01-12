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
                <div class="card-category">Informasi grafik pada Villa Pondok Masa Depan</div>
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

                    <div class="col-md-12 text-center">
                        <h3 class="text-center mb-0">Jumlah Responden</h3>
                        <small id="title-jumlah-responden" class="text-center mb-5"></small>
                        <canvas id="canvas-jumlah-responden"></canvas>
                    </div>

                    <div class="col-md-12 text-center mt-5">
                        <h3 class="text-center mb-0">Hasil Kuesioner</h3>
                        <small id="title-hasil-kuesioner" class="text-center mb-5"></small>
                        <canvas id="canvas-hasil-kuesioner"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('bottom')
<script>
    var colorArray = [
        '#2ECC71','#E67E22','#F1C40F'
    ];

    function loadJumlahResponden() {
        var periode = $('#pilih-periode').val();

        var title = $('#title-jumlah-responden').text();
        $('#title-jumlah-responden').empty();
        $('#title-jumlah-responden').text("(Periode " + periode + ")");

        var url = "{{ route('get-responden', '') }}/" + periode;
        fetch(url).then(response => response.json())
            .then(function(data){
                // console.log(data);

                setChartJumlahResponden(data.bulan, data.responden, data.max);
            }).catch(function(e){
                alert("gagal mengambil data");
            });
            
    }

    function loadHasilKuesioner() {
        var periode = $('#pilih-periode').val();

        var title = $('#title-hasil-kuesioner').text();
        $('#title-hasil-kuesioner').empty();
        $('#title-hasil-kuesioner').text(" (Periode " + periode + ")");

        var url = "{{ route('get-nilai', '') }}/" + periode;
        fetch(url).then(response => response.json())
            .then(function(data){
                // console.log(data);

                setChartHasilKuesioner(data.bulan, data.hasilKuesioner, data.max);
            }).catch(function(e){
                console.log(e);
            });
            
    }

    function setChartJumlahResponden(bulan, responden, max) {
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
    }

    function setChartHasilKuesioner(bulan, hasilKuesioner, max) {
        var canvas = document.getElementById('canvas-hasil-kuesioner');

        var myChart = new Chart(canvas, {
            type: 'bar',
            data: {
                labels: bulan,
                datasets: [],
            }
        });

        var i = 0;
        for(year in hasilKuesioner) {
            var newDataSet = {
                label: year,
                backgroundColor: colorArray[i],
                data: []
            }

            for(value in hasilKuesioner[year]) {
                newDataSet.data.push(hasilKuesioner[year][value]);
            }

            myChart.config.data.datasets.push(newDataSet);
            i++;
        }

        myChart.update();
    }
    
    $(document).ready(function () {
        loadJumlahResponden();
        loadHasilKuesioner();
        
        $('#pilih-periode').change(function () {
            loadJumlahResponden();
            loadHasilKuesioner();
        });
    });
</script>
@endpush
