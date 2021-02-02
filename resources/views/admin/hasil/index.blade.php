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
                <div class="card-title">Hasil</div>
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

                    <div class="col-md-12">
                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="jumlahresponden-tab" data-toggle="tab" href="#jumlahresponden" role="tab" aria-controls="jumlahresponden" aria-selected="true">Jumlah Responden</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="hasilkuesioner-tab" data-toggle="tab" href="#hasilkuesioner" role="tab" aria-controls="hasilkuesioner" aria-selected="false">Hasil Kuesioner</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="penilaianresponden-tab" data-toggle="tab" href="#penilaianresponden" role="tab" aria-controls="penilaianresponden" aria-selected="false">Penilaian Responden</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="jumlahresponden" role="tabpanel" aria-labelledby="jumlahresponden-tab">
                                <div class="col-md-12 text-center">
                                    <h3 class="text-center mb-0">Jumlah Responden</h3>
                                    <small id="title-jumlah-responden" class="text-center mb-5"></small>
                                    <div id="container-jumlah-responden">
                                        <canvas id="canvas-jumlah-responden"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="hasilkuesioner" role="tabpanel" aria-labelledby="hasilkuesioner-tab">
                                <div class="col-md-12 text-center">
                                    <h3 class="text-center mb-0">Hasil Kuesioner</h3>
                                    <small id="title-hasil-kuesioner" class="text-center mb-5"></small>
                                    <div id="container-hasil-kuesioner">
                                        <canvas id="canvas-hasil-kuesioner"></canvas>
                                    </div>
                                </div>                                
                            </div>

                            <div class="tab-pane fade" id="penilaianresponden" role="tabpanel" aria-labelledby="penilaianresponden-tab">
                                <div class="col-md-12">
                                    <h3 class="text-center mb-0">Penilaian Responden</h3>
                                    <table id="basic-datatables" class="table">
                                        <thead>
                                            <tr>
                                                <th width="50">No</th>
                                                <th width="100">Tanggal Penilaian</th>
                                                <th width="500">Responden</th>
                                                <th width="10">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data_responden as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->tgl_input }}</td>
                                                <td>{{ $item->user->nama_user }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.hasil.show', $item->id_responden) }}" class="btn btn-info btn-sm ml-2">
                                                            <i class="far fa-eye"></i> Lihat Penilaian
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
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
    var colorArray = [
        '#ef4723','#f68e1f','#fecc09','#7ebb42','#0f9246'
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
        $('#canvas-jumlah-responden').remove(); // this is my <canvas> element
        $('#container-jumlah-responden').append('<canvas id="canvas-jumlah-responden"><canvas>');
        
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
        $('#canvas-hasil-kuesioner').remove(); // this is my <canvas> element
        $('#container-hasil-kuesioner').append('<canvas id="canvas-hasil-kuesioner"><canvas>');

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


        $('#basic-datatables').DataTable();
    });
</script>
@endpush
