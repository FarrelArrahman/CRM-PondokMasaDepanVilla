<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = Periode::latest('tgl_selesai')->get();
        return view('admin.periode.index', [
            'periode' => $periode,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.periode.add');
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
                'nama_periode'  => 'required',
                'tahun_periode' => 'required',
                'tgl_mulai'     => 'required|date',
                'tgl_selesai'   => 'required|date',
                'status'        => 'required',
            ]
        );

        $validated['id_user'] = auth()->user()->id_user;
        
        $periode = Periode::create($validated);
        return redirect()->route('admin.periode.index')->with(['message' => 'Data berhasil ditambahkan.', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function edit(Periode $periode)
    {
        return view('admin.periode.edit', ['periode' => $periode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periode $periode)
    {
        $validated = $request->validate(
            [
                'nama_periode'  => 'required',
                'tahun_periode' => 'required',
                'tgl_mulai'     => 'required|date',
                'tgl_selesai'   => 'required|date',
                'status'        => 'required',
            ]
        );

        $validated['id_user'] = auth()->user()->id_user;

        $periode->update($validated);
        return redirect()->route('admin.periode.index')->with(['message' => 'Data berhasil diubah.', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periode $periode)
    {
        $periode->delete();
        return redirect()->route('admin.periode.index')->with(['message' => 'Data berhasil dihapus.', 'status' => 'success']);
    }
}
