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
        $hasil_kuesioner = [];
        $max = 10;

        foreach($bulan as $key => $value) {
            $hasil_kuesioner[$key] = UlasanMasukan::distinct('id_responden')
                ->whereMonth('tgl_input', $key + 1)
                ->whereYear('tgl_input', $periode)
                ->count() ?? 0;
            if($max < $hasil_kuesioner[$key]){
                $max = $hasil_kuesioner[$key];
            }
        }

        return response()->json([
            'status' => 200,
            'bulan' => $bulan,
            'responden' => $hasil_kuesioner,
            'max' => $max,
        ]);
    }
}
