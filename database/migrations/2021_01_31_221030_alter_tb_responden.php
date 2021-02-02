<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbResponden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_responden', function ($table) {
            $table->dropColumn(['nama_responden','email','no_hp','jenis_kel','alamat','status','keterangan']);
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_periode');
            $table->date('tgl_input')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->string('nama_responden');
        $table->string('email');
        $table->string('no_hp');
        $table->string('jenis_kel');
        $table->string('alamat');
        $table->string('status');
        $table->string('keterangan');
        $table->dropColumn(['id_user','id_periode','tgl_input']);
    }
}
