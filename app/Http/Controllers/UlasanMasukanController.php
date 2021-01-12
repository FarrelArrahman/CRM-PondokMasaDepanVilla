<?php

namespace App\Http\Controllers;

use App\Models\UlasanMasukan;
use Illuminate\Http\Request;

class UlasanMasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ulasanMasukan = UlasanMasukan::all();
        return view('admin.ulasan_masukan.index', [
            'ulasanMasukan' => $ulasanMasukan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UlasanMasukan  $ulasanMasukan
     * @return \Illuminate\Http\Response
     */
    public function show(UlasanMasukan $ulasanMasukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UlasanMasukan  $ulasanMasukan
     * @return \Illuminate\Http\Response
     */
    public function edit(UlasanMasukan $ulasanMasukan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UlasanMasukan  $ulasanMasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UlasanMasukan $ulasanMasukan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UlasanMasukan  $ulasanMasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(UlasanMasukan $ulasanMasukan)
    {
        //
    }
}
