<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\Responden;
use App\Models\HasilKuesioner;
use App\Models\UlasanMasukan;
use Auth;
use DataTables;

class HasilController extends Controller
{
    public function index()
    {
        $data_periode = Periode::orderBy('tahun_periode', 'DESC')->get();

        $data_responden = Responden::all();

        return view('admin.hasil.index', [
            'data_periode' => $data_periode,
            'data_responden' => $data_responden,
        ]);
    }

    public function show($id)
    {
        $data_responden = Responden::find($id);

        $nilai = 0;
        foreach($data_responden->kuesioner as $value) {
            $nilai += $value->nilai;
        }
        $nilai /= $data_responden->kuesioner->count();

        return view('admin.hasil.show', [
            'data_responden' => $data_responden,
            'nilai' => $nilai
        ]);
    }

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
        $range_nilai = [5, 4, 3, 2, 1];
        $hasil_kuesioner = [];
        $max = 10;

        foreach($range_nilai as $nilai) {
            foreach($bulan as $key => $value) {
                $hasil_kuesioner[$nilai][$value] = HasilKuesioner::with('periode')
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
