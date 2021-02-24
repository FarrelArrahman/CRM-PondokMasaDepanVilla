<html>
<head>
	<title>Laporan Jumlah Responden</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td {
            padding: 5px;
        }
    </style>
</head>
<body>
	<div>
        <h1 style="margin-bottom: 10px;" align="center">Pondok Masa Depan Villa</h1>
        <h3 style="margin-top: 0;" align="center">Hasil Penilaian Kuesioner</h3>
        <hr>
        <table>
        <tr>
            <th align="left" width="100">Nama Responden</th>
            <td width="10">:</td>
            <td>{{ $data_responden->nama_responden }}</td>
        </tr>
        <tr>
            <th align="left" width="100">Periode Kuesioner</th>
            <td width="10">:</td>
            <td>{{ $data_responden->kuesioner->first()->pertanyaan->periode->tahun_periode }}</td>
        </tr>
        <tr>
            <th align="left" width="100">Rata-rata nilai</th>
            <td width="10">:</td>
            <td>{{ round($nilai, 2) }}</td>
        </tr>
        <tr>
            <th align="left" width="100">Ulasan responden</th>
            <td width="10">:</td>
            <td>{{ $data_responden->ulasan->ulasan_masukan }}</td>
        </tr>
        </table>

        <br>
        <br>

        <table border="1">
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
                    <td align="center">{{ $loop->iteration }}</td>
                    <td>{{ $item->pertanyaan->pertanyaan }}</td>
                    <td align="center">{{ $item->nilai }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('js/plugin/chart.js/chart.min.js') }}"></script>
    <!-- jsPDF -->
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
                    alert(e);
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
            // loadHasilKuesioner();
        });
    </script>
</body>
</html>