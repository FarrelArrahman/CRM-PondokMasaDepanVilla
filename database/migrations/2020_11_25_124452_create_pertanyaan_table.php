<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pertanyaan', function (Blueprint $table) {
            $table->increments('id_pertanyaan');
            $table->integer('id_periode')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->dateTime('tgl_input');
            $table->text('pertanyaan');

            // Alter foreign key
            $table->foreign('id_periode')->references('id_periode')->on('tb_periode');
            $table->foreign('id_user')->references('id_user')->on('tb_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pertanyaan');
    }
}
