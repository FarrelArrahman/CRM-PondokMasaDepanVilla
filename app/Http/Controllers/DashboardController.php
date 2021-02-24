<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\Responden;
use App\Models\Pertanyaan;
use App\Models\HasilKuesioner;
use App\Models\UlasanMasukan;
use Auth;

class DashboardController extends Controller
{
    protected $periode_aktif;

    public function __construct()
    {
        // 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $periode = Periode::where('status', 1)->get();
        $this->periode_aktif = Periode::latest('tgl_selesai')->first();

        foreach($periode as $value) {
            if(
                date('Y-m-d', strtotime($value->tgl_mulai)) <= date('Y-m-d') && 
                date('Y-m-d', strtotime($value->tgl_selesai)) >= date('Y-m-d')
            ) {
                $this->periode_aktif = $value;
            }
        }

        if(Auth::user()->status == 'responden')
        return redirect()->route('ulasan');
        
        $data_responden = $this->responden()->count();

        $data_pertanyaan = $this->pertanyaan()->count();

        $data_periode = [
            'total' => Periode::count(),
            'min' => Periode::orderBy('tahun_periode', 'ASC')->first()->tahun_periode,
            'max' => Periode::orderBy('tahun_periode', 'DESC')->first()->tahun_periode,
        ];

        $data_rating = [
            'avg' => round($this->rating(), 2),
            'max' => 5,
        ];

        return view('admin.dashboard.index', [
            'periode_aktif' => $this->periode_aktif,
            'data_responden' => $data_responden,
            'data_pertanyaan' => $data_pertanyaan,
            'data_periode' => $data_periode,
            'data_rating' => $data_rating,
        ]);
    }

    public function rating()
    {
        $rating = 0;
        
        foreach($this->responden() as $key => $value) {
            $nilai = 0;
            $pertanyaan = [];

            foreach($value->kuesioner as $k => $v) {
                $nilai += $v->nilai;
                $pertanyaan[] = $v->id_pertanyaan;
            }

            $rating = $nilai / count($pertanyaan);
        }

        return $rating;
    }

    public function nilai()
    {
        $nilai = HasilKuesioner::sum('nilai');

        return $nilai;
    }

    public function pertanyaan()
    {
        $periode_aktif = $this->periode_aktif;

        $pertanyaan = Pertanyaan::whereHas('periode', function ($query) use ($periode_aktif) {
            $query->where('status', 1);
            $query->where('id_periode', $periode_aktif->id_periode);
        })->get();

        return $pertanyaan;
    }

    public function responden()
    {
        $pertanyaan = $this->pertanyaan()->pluck('id_pertanyaan');

        $responden = Responden::with('kuesioner')->whereHas('kuesioner', function($query) use ($pertanyaan) {
            $query->whereIn('id_pertanyaan', $pertanyaan);
        })->get();

        return $responden;
    }
}
