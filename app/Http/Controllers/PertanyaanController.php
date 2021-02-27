<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanyaan;
use App\Models\Periode;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::whereHas('periode', function ($query) {
            return $query->where('status', '1');
        })->latest('tgl_input')->get();

        return view('admin.pertanyaan.index', [
            'pertanyaan' => $pertanyaan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periode = Periode::whereStatus(1)->get();
        return view('admin.pertanyaan.add', [
            'periode' => $periode,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'id_periode'    => 'required',
                'pertanyaan'    => 'required',
            ]
        );
        
        $pertanyaan = Pertanyaan::create(array_merge($validated, [
            'id_user'   => auth()->user()->id_user,
            'tgl_input' => date('Y-m-d'),
        ]));

        return redirect()->route('admin.pertanyaan.index')->with(['message' => 'Data berhasil ditambahkan.', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pertanyaan $pertanyaan)
    {
        $periode = Periode::whereStatus(1)->get();
        return view('admin.pertanyaan.edit', [
            'pertanyaan' => $pertanyaan,
            'periode' => $periode,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pertanyaan $pertanyaan)
    {
        $validated = $request->validate(
            [
                'id_periode'    => 'required',
                'pertanyaan'    => 'required',
            ]
        );

        $pertanyaan->update($validated);
        return redirect()->route('admin.pertanyaan.index')->with(['message' => 'Data berhasil diubah.', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pertanyaan $pertanyaan)
    {
        //
    }
}
