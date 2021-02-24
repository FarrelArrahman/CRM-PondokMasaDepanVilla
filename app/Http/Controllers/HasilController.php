<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\Responden;
use App\Models\HasilKuesioner;
use App\Models\UlasanMasukan;
use Auth;
use PDF;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

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

    public function getBulan(Periode $periode)
    {
        $bulan = [];

        foreach(CarbonPeriod::create($periode->tgl_mulai, '1 month', $periode->tgl_selesai) as $b) {
            $bulan[$b->format('m')] = $b->format('F Y');
        }

        return $bulan;
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
    public function responden2(Periode $periode)
    {
        // $periode = $periode ?? date('Y');

        // $bulan = Periode::getBulan();
        $bulan = $this->getBulan($periode);
        // dd($periode);

        $responden = [];
        $max = 10;

        foreach($bulan as $key => $value) {
            $responden[$key] = UlasanMasukan::distinct('id_responden')
                ->whereMonth('tgl_input', $key)
                ->whereYear('tgl_input', $periode->tahun_periode)
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
     * Ambil data responden.
     * 
     * @return \Illuminate\Http\Response
     */
    public function responden(Periode $periode)
    {
        // $periode = $periode ?? date('Y');

        // $bulan = Periode::getBulan();
        $bulan = $this->getBulan($periode);
        // dd($periode);

        $responden = [];
        $max = 10;

        $i = 0;
        foreach($bulan as $key => $value) {
            $responden[$i] = UlasanMasukan::distinct('id_responden')
                ->whereMonth('tgl_input', $key)
                ->whereYear('tgl_input', $periode->tahun_periode)
                ->count() ?? 0;

            // $responden[$key] = rand(2,50);

            if($max < $responden[$i]){
                $max = $responden[$i];
            }

            $i++;
        }

        foreach($bulan as $b) {
            $bln[] = $b;
        }

        return response()->json([
            'status' => 200,
            'bulan' => $bln,
            'responden' => $responden,
            'max' => $max,
        ]);
    }

    /**
     * Ambil data nilai.
     * 
     * @return \Illuminate\Http\Response
     */
    public function nilai(Periode $periode)
    {
        // dd(HasilKuesioner::with('periode')->get());
        // $periode = $periode ?? date('Y');

        // $bulan = Periode::getBulan();
        $bulan = $this->getBulan($periode);

        $range_nilai = [5, 4, 3, 2, 1];
        $hasil_kuesioner = [];
        $max = 10;

        foreach($range_nilai as $nilai) {
            foreach($bulan as $key => $value) {
                $hasil_kuesioner[$nilai][$value] = HasilKuesioner::with('periode')
                    ->whereMonth('tgl_input', $key)
                    ->whereYear('tgl_input', $periode->tahun_periode)
                    ->where('nilai', $nilai)
                    ->count();

                // $hasil_kuesioner[$keterangan][$value] = rand(2,50);
            }
        }

        foreach($bulan as $b) {
            $bln[] = $b;
        }

        return response()->json([
            'status' => 200,
            'bulan' => $bln,
            'hasilKuesioner' => $hasil_kuesioner,
            'max' => $max,
        ]);
    }

    public function pdf($id)
    {
        $data_responden = Responden::find($id);

        $nilai = 0;
        foreach($data_responden->kuesioner as $value) {
            $nilai += $value->nilai;
        }
        $nilai /= $data_responden->kuesioner->count();

        $pdf = PDF::loadview('admin.hasil.pdf', [
            'data_responden' => $data_responden,
            'nilai' => $nilai
        ]);
        return $pdf->download('HasilPenilaian'.$data_responden->kuesioner->first()->pertanyaan->periode->tahun_periode.'-'.strtotime(date('Y-m-d h:i:s')));
    }
}
