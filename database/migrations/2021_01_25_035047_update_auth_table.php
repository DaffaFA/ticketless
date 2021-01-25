<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penumpang', function (Blueprint $table) {
            $table->string('api_token')->after('telefone');
        });
        
        Schema::table('petugas', function (Blueprint $table) {
            $table->string('api_token')->after('id_level');
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
            $table->dropColumn('api_token');    
        });
        
        Schema::table('penumpang', function (Blueprint $table) {
            $table->dropColumn('api_token');    
        });
    }
}
