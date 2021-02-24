@extends('admin.layout.template')

@section('header')
<div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
            <h2 class="text-white pb-2 fw-bold">Hasil</h2>
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
                        <form>
                            @csrf
                            <div class="form-inline pull-right">
                                <label for="pilih-periode" class="mr-3">Pilih Periode</label>
                                <select name="periode" id="pilih-periode" class="form-control">
                                    @foreach($data_periode as $periode)
                                    <option value="{{ $periode->id_periode }}">{{ $periode->nama_periode }}</option>
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
                                    <button id="download-jumlah-responden" class="ml-3 btn btn-danger pull-right">Download Laporan</button>
                                    <!-- <h3 class="text-center mb-0">Jumlah Responden</h3>
                                    <small id="title-jumlah-responden" class="text-center mb-5"></small> -->
                                    <div id="container-jumlah-responden">
                                        <canvas id="canvas-jumlah-responden"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="hasilkuesioner" role="tabpanel" aria-labelledby="hasilkuesioner-tab">
                                <div class="col-md-12 text-center">
                                <button id="download-hasil-kuesioner" class="ml-3 btn btn-danger pull-right">Download Laporan</button>
                                    <!-- <h3 class="text-center mb-0">Hasil Kuesioner</h3>
                                    <small id="title-hasil-kuesioner" class="text-center mb-5"></small> -->
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
                                            <td>{{ $item->kuesioner->first()->tgl_input }}</td>
                                            <td>{{ $item->nama_responden }}</td>
                                            <td>
                                                <a href="{{ route('admin.hasil.show', $item->id_responden) }}" class="btn btn-info btn-sm ml-2">
                                                    <i class="far fa-eye"></i> Lihat Penilaian
                                                </a>
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
        </div>
    </div>
</div>
@endsection

@push('bottom')
<script src="https://cdn.jsdelivr.net/npm/jspdf@1.5.3/dist/jspdf.min.js"></script>
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
        var periode = $('#pilih-periode').val();
        var periode_title = $('#pilih-periode :selected').text();
        
        $('#canvas-jumlah-responden').remove(); // this is my <canvas> element
        $('#container-jumlah-responden').append('<canvas id="canvas-jumlah-responden"><canvas>');
        
        var chartData = {
            labels: bulan,
            datasets: [{
                label: "Responden",
                backgroundColor: "#E74C3C",
                data: responden
            }],
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
                },
                title: {
                    display: true,
                    text: ['Jumlah Responden','(' + periode_title + ')'],
                    fontSize: 24,
                }
            }
        });
    }

    function setChartHasilKuesioner(bulan, hasilKuesioner, max) {
        var periode = $('#pilih-periode').val();
        var periode_aktif = $('#pilih-periode :selected').text();

        $('#canvas-hasil-kuesioner').remove(); // this is my <canvas> element
        $('#container-hasil-kuesioner').append('<canvas id="canvas-hasil-kuesioner"><canvas>');

        var canvas = document.getElementById('canvas-hasil-kuesioner');

        var myChart = new Chart(canvas, {
            type: 'bar',
            data: {
                labels: bulan,
                datasets: [],
            },
            options: {
                title: {
                    display: true,
                    text: ['Hasil Kuesioner','(' + periode_aktif + ')'],
                    fontSize: 24,
                }
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

        $('#download-jumlah-responden').click(function(e) {
            e.preventDefault();
            var periode = $('#pilih-periode').val();
            var canvas = document.querySelector("#canvas-jumlah-responden");
            var canvas_img = canvas.toDataURL("image/png",1.0); //JPEG will not match background color

            var pdf = new jsPDF('landscape','in', 'letter'); //orientation, units, page size

            pdf.addImage(canvas_img, 'png', .5, 1.75, 10, 5); //image, type, padding left, padding top, width, height
            pdf.save('JumlahResponden' + periode + '-' + (+ new Date()) + '.pdf');
            // pdf.autoPrint(); //print window automatically opened with pdf
            // var blob = pdf.output("bloburl");
            // window.open(blob);
        });

        $('#download-hasil-kuesioner').click(function(e) {
            e.preventDefault();
            var periode = $('#pilih-periode').val();
            var canvas = document.querySelector("#canvas-hasil-kuesioner");
            var canvas_img = canvas.toDataURL("image/png",1.0); //JPEG will not match background color

            var pdf = new jsPDF('landscape','in', 'letter'); //orientation, units, page size

            pdf.addImage(canvas_img, 'png', .5, 1.75, 10, 5); //image, type, padding left, padding top, width, height
            pdf.save('HasilKuesioner' + periode + '-' + (+ new Date()) + '.pdf');
            // pdf.autoPrint(); //print window automatically opened with pdf
            // var blob = pdf.output("bloburl");
            // window.open(blob);
        });
    });

    $('#basic-datatables').DataTable();
</script>
@endpush
