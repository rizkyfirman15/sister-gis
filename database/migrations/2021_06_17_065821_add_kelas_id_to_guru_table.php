<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKelasIdToGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guru', function (Blueprint $table) {
            $table->Integer('kelas_id')->after('mapel_id');
            
            // $table->foreign('kelas_id')->references('id')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guru', function (Blueprint $table) {
            //
        });
    }
}
