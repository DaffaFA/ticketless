<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportasi', function (Blueprint $table) {
            $table->id('id_transportasi');
            $table->string('kode');
            $table->integer('jumlah_kursi');
            $table->string('keterangan');
            $table->unsignedBigInteger('id_type_transportasi');
            $table->timestamps();
        });

        Schema::table('rute', function (Blueprint $table) {
            $table->foreign('id_transportasi')->references('id_transportasi')->on('transportasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transportasis');
    }
}
