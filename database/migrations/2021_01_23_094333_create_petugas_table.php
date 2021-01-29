<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->id('id_petugas');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nama_petugas');
            $table->unsignedBigInteger('id_level');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('pemesanan', function (Blueprint $table) {
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petugas');
    }
}
