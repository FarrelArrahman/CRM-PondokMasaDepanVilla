<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\Pertanyaan;
use App\Models\Responden;
use App\Models\HasilKuesioner;
use App\Models\UlasanMasukan;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * Menampilkan halaman ulasan.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ulasan()
    {
        $pertanyaan = Pertanyaan::whereHas('periode', function ($query) {
            return $query->where('tahun_periode', date('Y'));
        })->get();

        return view('home.ulasan', [
            'pertanyaan' => $pertanyaan,
        ]);
    }

    /**
     * Menerima ulasan dari responden.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $data_periode = Periode::where('tahun_periode', date('Y'))->first();

        $data_responden = $request->only([
            'nama_responden',
            'email',
            'no_hp',
            'jenis_kel',
            'alamat',
        ]);

        $data_kuesioner = $request->except([
            'nama_responden',
            'email',
            'no_hp',
            'jenis_kel',
            'alamat',
            'ulasan',
            '_token'
        ]);

        $data_responden = array_merge($data_responden, ['status' => 'Aktif', 'keterangan' => '']);

        $responden = Responden::create($data_responden);
        
        foreach($data_kuesioner as $id_pertanyaan => $nilai) {
            $kuesioner = HasilKuesioner::create([
                'id_responden' => $responden->id_responden,
                'id_pertanyaan' => $id_pertanyaan,
                'nilai' => $nilai,
            ]);
        }

        $ulasan = UlasanMasukan::create([
            'id_responden' => $responden->id_responden,
            'id_periode' => $data_periode->id_periode,
            'ulasan_masukan' => $request->ulasan,
            'tgl_input' => date('Y-m-d'),
            'keterangan' => '',
        ]);

        return redirect('/')->with(['message' => 'Ulasan telah berhasil terkirim.', 'status' => 'success']);
    }
}
