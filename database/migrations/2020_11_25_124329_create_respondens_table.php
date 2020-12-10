<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespondensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_responden', function (Blueprint $table) {
            $table->increments('id_responden');
            $table->string('nama_responden');
            $table->string('email');
            $table->string('no_hp');
            $table->string('jenis_kel');
            $table->string('alamat');
            $table->string('status');
            $table->string('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respondens');
    }
}
