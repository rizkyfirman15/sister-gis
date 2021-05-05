<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSekolahAsalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_sekolah_asals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('siswa_id');
            // $table->integer('siswa_id');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar');
            $table->string('name', 50);
            $table->string('alamat');
            $table->string('no_ijazah', 20);
            $table->string('rata_rata_nilai', 10);
            $table->string('no_skhun', 20);
            $table->string('document');
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_sekolah_asals');
    }
}
