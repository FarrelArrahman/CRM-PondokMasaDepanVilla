<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Responden;
use App\Models\Pertanyaan;
use App\Models\HasilKuesioner;

class HasilKuesionerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$responden = Responden::all();
    	$pertanyaan = Pertanyaan::all();

        foreach($responden as $res) {
        	foreach($pertanyaan as $per) {
	        	HasilKuesioner::create([
	        		'id_responden'		=> $res->id_responden,
			        'id_pertanyaan'		=> $per->id_pertanyaan,
			        'nilai'				=> rand(1,5),
			        'tgl_input'			=> now()
	        	]);
	        }
        }
    }
}
