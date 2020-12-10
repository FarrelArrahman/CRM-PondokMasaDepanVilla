<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlasanMasukansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ulasan_masukan', function (Blueprint $table) {
            $table->increments('id_ulasan_masukan');
            $table->integer('id_responden')->unsigned();
            $table->integer('id_periode')->unsigned();
            $table->text('ulasan_masukan');
            $table->dateTime('tgl_input');
            $table->string('keterangan');

            // Alter foreign key
            $table->foreign('id_responden')->references('id_responden')->on('tb_responden');
            $table->foreign('id_periode')->references('id_periode')->on('tb_periode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_ulasan_masukan');
    }
}
