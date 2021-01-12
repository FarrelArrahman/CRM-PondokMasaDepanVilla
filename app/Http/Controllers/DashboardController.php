<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\Responden;
use App\Models\HasilKuesioner;
use App\Models\UlasanMasukan;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_periode = Periode::orderBy('tahun_periode', 'DESC')->get();

        return view('admin.dashboard.index', [
            'data_periode' => $data_periode,
        ]);
    }

    /**
     * Ambil data bulan.
     * 
     * @return \Illuminate\Http\Response
     */
    public function bulan()
    {
        $bulan = Periode::getBulan();

        return response()->json([
            'status' => 200,
            'data' => $bulan,
        ]);
    }

    /**
     * Ambil data responden.
     * 
     * @return \Illuminate\Http\Response
     */
    public function responden($periode)
    {
        $periode = $periode ?? date('Y');

        $bulan = Periode::getBulan();
        $responden = [];
        $max = 10;

        foreach($bulan as $key => $value) {
            $responden[$key] = UlasanMasukan::distinct('id_responden')
                ->whereMonth('tgl_input', $key + 1)
                ->whereYear('tgl_input', $periode)
                ->count() ?? 0;

            // $responden[$key] = rand(2,50);

            if($max < $responden[$key]){
                $max = $responden[$key];
            }
        }

        return response()->json([
            'status' => 200,
            'bulan' => $bulan,
            'responden' => $responden,
            'max' => $max,
        ]);
    }

    /**
     * Ambil data nilai.
     * 
     * @return \Illuminate\Http\Response
     */
    public function nilai($periode)
    {
        // dd(HasilKuesioner::with('periode')->get());
        $periode = $periode ?? date('Y');

        $bulan = Periode::getBulan();
        $range_nilai = [3, 2, 1];
        $hasil_kuesioner = [];
        $max = 10;

        foreach($range_nilai as $nilai) {
            foreach($bulan as $key => $value) {
                if($nilai == 3) $keterangan = "Baik";
                else if($nilai == 2) $keterangan = "Cukup";
                else if($nilai == 1) $keterangan = "Buruk";

                $hasil_kuesioner[$keterangan][$value] = HasilKuesioner::with('periode')
                    ->whereMonth('tgl_input', $key + 1)
                    ->whereYear('tgl_input', $periode)
                    ->where('nilai', $nilai)
                    ->count();

                // $hasil_kuesioner[$keterangan][$value] = rand(2,50);
            }
        }

        return response()->json([
            'status' => 200,
            'bulan' => $bulan,
            'hasilKuesioner' => $hasil_kuesioner,
            'max' => $max,
        ]);
    }
}
