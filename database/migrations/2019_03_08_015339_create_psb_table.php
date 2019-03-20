<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePsbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psb', function (Blueprint $table) {
            $table->integer('id_psb');
            $table->integer('id_siswa');
            $table->string('tgl_pembayaran');
            $table->string('id_rincian');
            $table->double('nominal');
            $table->string('status_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('psb');
    }
}
