    public function getBulan(Periode $periode)
    {
        $bulan = [];

        foreach(CarbonPeriod::create($periode->tgl_mulai, '1 month', $periode->tgl_selesai) as $b) {
            $bulan[] = $b->format('F Y');
        }

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
    public function responden(Periode $periode)
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