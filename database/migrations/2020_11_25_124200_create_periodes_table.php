<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_periode', function (Blueprint $table) {
            $table->increments('id_periode');
            // $table->integer('id_user'); // ini gak perlu
            $table->string('nama_periode');
            $table->year('tahun_periode');
            $table->dateTime('tgl_mulai');
            $table->dateTime('tgl_selesai');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_periode');
    }
}
