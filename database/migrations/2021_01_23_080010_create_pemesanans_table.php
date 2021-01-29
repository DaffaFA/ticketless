<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id('id_pemesanan');
            $table->string('kode_pemesanan');
            $table->dateTime('tanggal_pemesanan');
            $table->string('tempat_pemesanan');
            $table->unsignedBigInteger('id_pelanggan');
            $table->string('kode_kursi');
            $table->unsignedBigInteger('id_rute');
            $table->string('tujuan');
            $table->dateTime('tanggal_berangkat');
            $table->time('jam_cekin');
            $table->time('jam_berangkat');
            $table->string('total_bayar');
            $table->unsignedBigInteger('id_petugas');
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id_penumpang')->on('penumpang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
}
