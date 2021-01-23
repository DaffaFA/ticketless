<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeTransportasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_transportasi', function (Blueprint $table) {
            $table->id('id_type_transportasi');
            $table->string('nama_type');
            $table->text('keterangan');
            $table->timestamps();
        });

        Schema::table('transportasi', function (Blueprint $table) {
            $table->foreign('id_type_transportasi')->references('id_type_transportasi')->on('type_transportasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_transportasis');
    }
}
