<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilKuesionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_hasil_kuesioner', function (Blueprint $table) {
            $table->increments('id_hasil_kuesioner');
            $table->integer('id_responden')->unsigned();
            $table->integer('id_pertanyaan')->unsigned();
            $table->double('hasil_kuesioner', 8, 2);
            $table->double('nilai', 8, 2);

            // Alter foreign key
            $table->foreign('id_responden')->references('id_responden')->on('tb_responden');
            $table->foreign('id_pertanyaan')->references('id_pertanyaan')->on('tb_pertanyaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_hasil_kuesioner');
    }
}
