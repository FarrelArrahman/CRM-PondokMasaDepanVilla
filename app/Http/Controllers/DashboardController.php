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
        $pertanyaan = Pertanyaan::whereHas('periode', function ($query) {
            $query->where('status', 1);
        })->get();

        return $pertanyaan;
    }

    public function responden()
    {
        $responden = Responden::with('kuesioner')->has('kuesioner')->get();

        return $responden;
    }
}
