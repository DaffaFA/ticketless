<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePenumpangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penumpang', function (Blueprint $table) {
            $table->dropColumn('jenis_kelamin');
            $table->string('telefone')->nullable()->change();
            $table->date('tanggal_lahir')->nullable()->change();
            $table->text('alamat_penumpang')->nullable()->change();
        });

        Schema::table('penumpang', function (Blueprint $table) {
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable()->after('tanggal_lahir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penumpang', function (Blueprint $table) {
            $table->string('telefone')->change();
            $table->date('tanggal_lahir')->change();
            $table->text('alamat_penumpang')->change();
        });
    }
}
